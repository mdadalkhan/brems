<script lang="ts">
  /**
   * BREMS Typing Engine v1.2
   * Features: Precise stroke counting, skip detection, and dynamic highlighting.
   */

  // 1. Configuration & Reference
  let input = "Programming languages are the way of talking with computer";
  const Words = input.split(/\s+/);

  // 2. Reactive State
  let typedInput = $state("");
  let paragraph = $state<{ word: string; status: "correct" | "wrong" }[]>([]);
  let different = $state<string[]>([]);
  let currentRefIndex = $state(0);

  // Stats
  let CorrectStrokes = $state(0);
  let ErrorStrokes = $state(0);
  let TotalStrokes = $state(0);

  const timeLimit = 30; 
  const StrokesPerWords = 5;
  const MAX_LOOKAHEAD = 10;

  /**
   * Core Engine Logic
   */
  function updateResults(rawInput: string) {
    // Split input into words, but keep the last empty string if user ends with a space
    const typedWords = rawInput.trimStart().split(/\s+/);
    const lastWordIsComplete = rawInput.endsWith(" ");
    
    // For processing logic, we remove the trailing empty string if it exists
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

        // Logic to determine if this is the word the user intended to type
        if (wordCorrectChars > 0 || (lookahead === 0 && typedWord.length > 0)) {
          
          // 1. HANDLE SKIPS: If lookahead > 0, we jumped over words
          if (lookahead > 0) {
            const skipped = Words.slice(refIndex, targetIdx);
            skipped.forEach(w => {
              newDifferent.push(w); 
              runningError += w.length; 
            });
          }

          // 2. STROKE CALCULATION
          const wordErrors = Math.max(0, typedWord.length - wordCorrectChars);
          runningCorrect += wordCorrectChars;
          runningError += wordErrors;

          // 3. STATUS TRACKING
          const isFullMatch = wordCorrectChars === refWord.length && typedWord.length === refWord.length;
          newParagraph.push({
            word: typedWord,
            status: isFullMatch ? "correct" : "wrong",
          });

          if (!isFullMatch) newDifferent.push(typedWord);

          refIndex = targetIdx + 1;
          matched = true;
          break;
        }
      }

      // If word didn't match anything in lookahead range
      if (!matched) {
        newDifferent.push(typedWord);
        runningError += typedWord.length;
        newParagraph.push({ word: typedWord, status: "wrong" });
      }
    }

    // --- HIGHLIGHTING FIX ---
    // If the last character is a space, the highlight should be on the NEXT word (refIndex)
    // If typing, it should be on the CURRENT word (refIndex)
    currentRefIndex = refIndex;

    // Update States
    paragraph = newParagraph;
    different = newDifferent;
    CorrectStrokes = runningCorrect;
    ErrorStrokes = runningError;
    TotalStrokes = CorrectStrokes + ErrorStrokes;
  }

  function getFinalResult() {
    const wpm = (CorrectStrokes / StrokesPerWords) / (timeLimit / 60);
    const accuracy = TotalStrokes === 0 ? 100 : (CorrectStrokes / TotalStrokes) * 100;
    
    console.log(`Speed: ${Math.ceil(wpm)} WPM`);
    console.log(`Accuracy: ${Math.ceil(accuracy)}%`);
    console.log(`Correct Strokes: ${CorrectStrokes}, Errors: ${ErrorStrokes}`);
  }
</script>

<style>
  .highlight { 
    background-color: #fef08a; /* Yellow-200 */
    border-bottom: 2px solid #eab308; /* Yellow-600 */
    color: #1a1a1a;
    transition: all 0.1s ease;
  }
  .word { padding: 0 2px; border-radius: 2px; }
  .text-correct { color: #10b981; } /* Green-500 */
  .text-wrong { color: #ef4444; }   /* Red-500 */
</style>

<div class="max-w-2xl mx-auto p-6 bg-white shadow-xl rounded-2xl space-y-8 mt-10 border border-gray-100">
  
  <div class="text-center">
    <h2 class="text-2xl font-bold text-gray-800">BREMS Engine v1.2</h2>
    <div class="flex justify-center gap-4 mt-2 text-sm font-medium">
      <span class="text-green-600">Correct: {CorrectStrokes}</span>
      <span class="text-red-600">Errors: {ErrorStrokes}</span>
    </div>
  </div>

  <div class="p-5 bg-gray-50 rounded-xl border border-gray-200 leading-relaxed text-xl text-gray-600 font-serif">
    {#each Words as word, i}
      <span class="word {i === currentRefIndex ? 'highlight' : ''}">{word}</span>{' '}
    {/each}
  </div>

  <div class="relative">
    <input
      type="text"
      bind:value={typedInput}
      oninput={(e) => updateResults(e.currentTarget.value)}
      placeholder="Type the highlighted word..."
      class="w-full p-4 text-xl border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-4 focus:ring-yellow-100 outline-none transition-all"
    />
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div class="space-y-2">
      <h4 class="text-xs font-bold uppercase text-gray-400 tracking-wider">Live Input Feedback</h4>
      <div class="flex flex-wrap gap-1 min-h-[50px] p-3 bg-gray-50 rounded-lg border border-dashed border-gray-300">
        {#each paragraph as item}
          <span class={item.status === 'wrong' ? 'text-wrong font-bold' : 'text-correct'}>
            {item.word}
          </span>
        {/each}
      </div>
    </div>

    <div class="space-y-2">
      <h4 class="text-xs font-bold uppercase text-gray-400 tracking-wider">Skipped / Incorrect</h4>
      <div class="flex flex-wrap gap-2 min-h-[50px] p-3 bg-red-50 rounded-lg border border-red-100">
        {#each different as word}
          <span class="text-xs bg-white text-red-600 px-2 py-1 rounded shadow-sm border border-red-200">
            {word}
          </span>
        {/each}
      </div>
    </div>
  </div>

  <button
    onclick={getFinalResult}
    class="w-full py-4 bg-gray-900 hover:bg-black text-white font-bold rounded-xl shadow-lg transform active:scale-[0.98] transition-all"
  >
    View Performance Report
  </button>
</div>