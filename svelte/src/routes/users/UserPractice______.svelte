<script lang="ts">
  /** 
   * BREMS Typing Engine v1.2
   * Features: Precise stroke counting, skip detection, dynamic highlighting, live WPM & accuracy
   */

  // --- Configuration & Reference ---
  let input = "Programming languages are the way of talking with computer";
  const Words = input.split(/\s+/);

  // --- Reactive State ---
  let typedInput = "";
  let paragraph: { word: string; status: "correct" | "wrong" }[] = [];
  let different: string[] = [];
  let currentRefIndex = 0;

  // --- Stats ---
  let CorrectStrokes = 0;
  let ErrorStrokes = 0;
  let TotalStrokes = 0;
  const timeLimit = 30; // seconds
  const StrokesPerWords = 5; // approx

  const MAX_LOOKAHEAD = 10;

  // --- Engine Logic ---
  function updateResults(rawInput: string) {
    const typedWords = rawInput.trimStart().split(/\s+/);
    const lastWordIsComplete = rawInput.endsWith(" ");
    const processingWords = lastWordIsComplete ? typedWords.slice(0, -1) : typedWords;

    let refIndex = 0;
    let runningCorrect = 0;
    let runningError = 0;
    const newParagraph: typeof paragraph = [];
    const newDifferent: string[] = [];

    for (let i = 0; i < processingWords.length; i++) {
      const typedWord = processingWords[i];
      let matched = false;

      for (let lookahead = 0; lookahead <= MAX_LOOKAHEAD; lookahead++) {
        const targetIdx = refIndex + lookahead;
        if (targetIdx >= Words.length) break;
        const refWord = Words[targetIdx];

        // Character-level partial match
        let wordCorrectChars = 0;
        const minLen = Math.min(typedWord.length, refWord.length);
        for (let j = 0; j < minLen; j++) {
          if (typedWord[j] === refWord[j]) wordCorrectChars++;
        }

        if (wordCorrectChars > 0 || (lookahead === 0 && typedWord.length > 0)) {
          // Handle skipped words
          if (lookahead > 0) {
            const skipped = Words.slice(refIndex, targetIdx);
            skipped.forEach(w => {
              newDifferent.push(w);
              runningError += w.length;
            });
          }

          const wordErrors = Math.max(0, typedWord.length - wordCorrectChars);
          runningCorrect += wordCorrectChars;
          runningError += wordErrors;

          const isFullMatch = wordCorrectChars === refWord.length && typedWord.length === refWord.length;
          newParagraph.push({ word: typedWord, status: isFullMatch ? "correct" : "wrong" });
          if (!isFullMatch) newDifferent.push(typedWord);

          refIndex = targetIdx + 1;
          matched = true;
          break;
        }
      }

      if (!matched) {
        newDifferent.push(typedWord);
        runningError += typedWord.length;
        newParagraph.push({ word: typedWord, status: "wrong" });
      }
    }

    // --- FIX: Only move highlight on completed word ---
    currentRefIndex = lastWordIsComplete ? refIndex : Math.min(refIndex, Words.length - 1);

    paragraph = newParagraph;
    different = newDifferent;
    CorrectStrokes = runningCorrect;
    ErrorStrokes = runningError;
    TotalStrokes = CorrectStrokes + ErrorStrokes;
  }

  function getFinalResult() {
    const wpm = (CorrectStrokes / StrokesPerWords) / (timeLimit / 60);
    const accuracy = TotalStrokes === 0 ? 100 : (CorrectStrokes / TotalStrokes) * 100;

    return {
      wpm: Math.ceil(wpm),
      accuracy: Math.ceil(accuracy),
      correct: CorrectStrokes,
      errors: ErrorStrokes
    };
  }
</script>

<style>
  .highlight {
    background-color: #fef08a; /* Yellow-200 */
    border-bottom: 2px solid #eab308; /* Yellow-600 */
    color: #1a1a1a;
    transition: all 0.1s ease;
  }
  .word {
    padding: 0 2px;
    border-radius: 2px;
  }
  .text-correct { color: #10b981; } /* Green-500 */
  .text-wrong { color: #ef4444; }   /* Red-500 */
</style>

<div class="max-w-2xl mx-auto p-6 bg-white shadow-xl rounded-2xl space-y-8 mt-10 border border-gray-100">
  <!-- Header / Stats -->
  <div class="text-center">
    <h2 class="text-2xl font-bold text-gray-800">BREMS Engine v1.2</h2>
    <div class="flex justify-center gap-4 mt-2 text-sm font-medium">
      <span class="text-green-600">Correct: {CorrectStrokes}</span>
      <span class="text-red-600">Errors: {ErrorStrokes}</span>
      <span class="text-blue-600">WPM: {getFinalResult().wpm}</span>
      <span class="text-purple-600">Accuracy: {getFinalResult().accuracy}%</span>
    </div>
  </div>

  <!-- Paragraph / Highlight -->
  <div class="p-5 bg-gray-50 rounded-xl border border-gray-200 leading-relaxed text-xl text-gray-600 font-serif">
    {#each Words as word, i}
      <span class="word {i === currentRefIndex ? 'highlight' : ''}">{word}</span>{' '}
    {/each}
  </div>

  <!-- Input -->
  <div class="relative">
    <input
      type="text"
      bind:value={typedInput}
      oninput={(e) => updateResults(e.currentTarget.value)}
      placeholder="Type the highlighted word..."
      class="w-full p-4 text-xl border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-4 focus:ring-yellow-100 outline-none transition-all"
    />
  </div>

  

  <!-- Final Result Button -->
  <button
    onclick={() => alert(JSON.stringify(getFinalResult(), null, 2))}
    class="w-full py-4 bg-gray-900 hover:bg-black text-white font-bold rounded-xl shadow-lg transform active:scale-[0.98] transition-all"
  >
    GET FINAL RESULT
  </button>
</div>
