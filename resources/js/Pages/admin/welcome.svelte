<script lang="ts">
  import Clock from "../components/Clock.svelte";
  import Logo from "../public/biam.svg";

  let username = "";
  let passkey = "";

  const handleSubmit = () => {
    // Logic for authentication
    console.log("Logging in with:", { username, passkey });
  };

  const currentYear = new Date().getFullYear();
</script>

<svelte:head>
  <title>BIAM BREMS © {currentYear}</title>
</svelte:head>

<div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center p-4">
  <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md">
    
    <div class="flex items-center space-x-4 mb-10">
      <img class="w-16 h-16 object-contain" src={Logo} alt="BIAM Logo" />
      <div>
        <h1 class="text-md font-bold text-gray-800">Recruitment Exam Management System</h1>
        <p class="text-gray-500 text-sm leading-tight">Login as Administrator</p>
        <div class="mt-1"><Clock /></div>
      </div>
    </div>

    <form on:submit|preventDefault={handleSubmit} class="space-y-5">
      
      <div class="relative">
        <label for="username" class="sr-only">Username</label>
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <input 
          id="username"
          type="text" 
          bind:value={username}
          placeholder="Enter your username"
          required
          class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" 
        />
      </div>

      <div class="relative">
        <label for="passkey" class="sr-only">Passkey</label>
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
          </svg>
        </div>
        <input 
          id="passkey"
          type="password" 
          bind:value={passkey}
          placeholder="Passkey"
          required
          class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" 
        />
      </div>

      <button 
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md shadow-md transition-transform active:scale-[0.98] flex items-center justify-center gap-2 group"
      >
        Sign In
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </button>
    </form>

    <footer class="mt-8 text-center text-gray-400 text-xs tracking-wide">
      <p>BIAM Foundation &copy; {currentYear}</p>
    </footer>
  </div>
</div>