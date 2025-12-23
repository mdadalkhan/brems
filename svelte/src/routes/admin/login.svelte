<script lang="ts">
  let counter = 0;

  function increment() {
    counter += 1; // increment the counter
  }
</script>

<main>
  <input type="button" on:click={increment} value="Increment" />
  <h1>{counter}</h1>
</main>
