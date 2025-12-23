<script lang="ts">
  import Timer from "../../components/Timer.svelte";
  import { users } from "../../lib/store.svelte.ts";
  import { onMount } from "svelte";

  interface UserApiResponse {
    bntype: string;
    roll: number;
    timeLimit: number;
    username: string;
  }

  let inputText: string = "";
  let roll: number = 0;
  let name: string = "";
  let timeLimit: number | null = null;
  let typedText: string = "";
  let isCompleted: boolean = false;

  onMount(async () => {
    try {
      const response = await fetch("http://localhost:3000/users/bntype");
      if (!response.ok) throw new Error("Fetch failed");

      const data: UserApiResponse = await response.json();

      inputText = data.bntype;
      roll = data.roll;
      timeLimit = data.timeLimit;
      name = data.username;
    } catch (err: unknown) {
      if (err instanceof Error) {
        console.error(err.message);
      }
    }
  });

  function preventPaste(event: Event): void {
    event.preventDefault();
  }

  function handleTimeUp(): void {
    isCompleted = true;
    alert("Time is up!");
  }

  console.log(users.password);
</script>

<div class="min-h-screen lg:mx-64 flex items-start justify-center pt-4 px-1">
  <div class="w-full bg-gray-50 p-2 rounded-sm shadow-md">
    <p
      class="font-bold text-2xl text-center p-1 rounded-sm"
      style="font-family: Noto Sans Bengali;"
    >
      বাংলা টাইপিং পরীক্ষা
    </p>
    <div class="mb-2 text-center">
      <p><strong>Name:</strong> {name} <strong>Roll:</strong> {roll}</p>
      <p></p>
    </div>
    <div
      style="font-family: Noto Sans Bengali;"
      class="mb-4 p-4 bg-white border border-gray-300 rounded-xs"
    >
      <p class="text-gray-700 max-h-55 overflow-y-auto justify-betwee">
        {inputText}
      </p>
    </div>
    <div class="mb-2 text-sky-700 font-medium flex items-center justify-center">
      {#if typeof timeLimit === "number"}
        <Timer totalTime={timeLimit} on:finished={handleTimeUp} />
      {:else}
        <div class="loading">Please Wait...</div>
      {/if}
    </div>

    <textarea
      spellcheck="false"
      bind:value={typedText}
      style="font-family: Noto Sans Bengali;"
      class="w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none p-3 mb-4"
      rows="4"
      placeholder="এখানে লেখা শুরু করুন...."
      on:paste={preventPaste}
      on:copy={preventPaste}
      on:cut={preventPaste}
    ></textarea>
    <div class="flex justify-end">
      <button
        name="app_root_input_submit"
        class="w-24 bg-blue-500 text-white font-semibold py-1 px-2 rounded-sm hover:bg-blue-600 transition-colors duration-300 shadow-lg cursor-pointer flex items-center justify-center gap-2"
      >
        Submit
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
          />
        </svg>
      </button>
    </div>
  </div>
</div>

<button
  on:click={() => {
    alert(typedText);
  }}>Typed</button
>
