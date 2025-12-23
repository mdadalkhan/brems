<script>
  import { onMount, onDestroy, createEventDispatcher } from "svelte";

  const dispatch = createEventDispatcher(); 
  export let totalTime;
  let timeLeft = totalTime;

  let interval;
  let blink = false;
  let blinkInterval;
  
  onMount(() => {
    interval = setInterval(() => {
      if (timeLeft > 0) {
        timeLeft -= 1;

        if (timeLeft <= 10 && !blinkInterval) {
          blinkInterval = setInterval(() => {
            blink = !blink;
          }, 500);
        }
      } else {
      
        clearInterval(interval);
        if (blinkInterval) clearInterval(blinkInterval);
        blink = false;
        dispatch('finished'); 
        
      }
    }, 1000);
  });

  onDestroy(() => {
    clearInterval(interval);
    if (blinkInterval) clearInterval(blinkInterval);
  });

  $: minutes = Math.floor(timeLeft / 60).toString().padStart(2, "0");
  $: seconds = (timeLeft % 60).toString().padStart(2, "0");
</script>

<div
  class="text-xl"
  class:font-bold={timeLeft <= 15}
  class:text-red-600={timeLeft <= 15}
  class:opacity-0={blink && timeLeft <= 15}  
>
  {minutes}:{seconds}
</div>