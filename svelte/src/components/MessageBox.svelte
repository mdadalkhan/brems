<script>
  import { onMount, onDestroy } from 'svelte';

  export let title = "Modal Title";
  export let message = "This is a warning message.";
  export let show = false;

  let modalRef;

  const close = () => {
    show = false;
    const event = new CustomEvent('close');
    dispatchEvent(event);
  };

  const handleKeydown = (e) => {
    if (e.key === 'Escape') close();
  };

  // Trap focus inside modal
  const trapFocus = (e) => {
    if (!modalRef) return;
    const focusableEls = modalRef.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    const firstEl = focusableEls[0];
    const lastEl = focusableEls[focusableEls.length - 1];

    if (e.key === 'Tab') {
      if (e.shiftKey) {
        if (document.activeElement === firstEl) {
          e.preventDefault();
          lastEl.focus();
        }
      } else {
        if (document.activeElement === lastEl) {
          e.preventDefault();
          firstEl.focus();
        }
      }
    }
  };

  onMount(() => {
    document.addEventListener('keydown', handleKeydown);
  });

  onDestroy(() => {
    document.removeEventListener('keydown', handleKeydown);
  });
</script>

{#if show}
  <div
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title"
    on:click="{close}"
  >
    <div
      class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative"
      on:click|stopPropagation
      bind:this={modalRef}
      on:keydown="{trapFocus}"
    >
      <header class="mb-4">
        <h2 id="modal-title" class="text-xl font-bold text-red-600">{title}</h2>
      </header>
      <div class="mb-6 text-gray-700">{message}</div>
      <footer class="text-right">
        <button
          type="button"
          class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition"
          on:click="{close}"
        >
          Close
        </button>
      </footer>
    </div>
  </div>
{/if}
