<script lang="ts">
  import Clock        from "./components/Clock.svelte"
  import Logo         from "./public/biam.svg"
</script>
<svelte:head>
   <title>BIAM BREMS &copy 2025 </title>
</svelte:head>
<div class="min-h-screen md:flex md:items-center justify-center bg-gray-100" style="font-family: Segoe UI Semibold;">
  <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-xl">
    <div class="flex items-center space-x-4 mb-8">
      <img class="w-16 h-16" src={Logo} alt="App logo" />
      <div>
        <p class="text-xl font-bold">Recruitment Exam Management System</p>
        <p class="text-gray-500 text-md">BIAM Foundation, Dhaka</p> <Clock />
      </div>
    </div>
    <!-- App root input Form -->
    <form>
       <div class="space-y-4 mb-6 sm:px-2 lg:px-10">
      <!-- Phone number input with phone icon -->
      <div class="relative">
        <input type="text"  placeholder="Enter your phone number"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-400 transition-all duration-300 shadow-sm" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
          class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2">
          <path fill-rule="evenodd"
            d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm5.03 4.72a.75.75 0 0 1 0 1.06l-1.72 1.72h10.94a.75.75 0 0 1 0 1.5H10.81l1.72 1.72a.75.75 0 1 1-1.06 1.06l-3-3a.75.75 0 0 1 0-1.06l3-3a.75.75 0 0 1 1.06 0Z"
            clip-rule="evenodd" />
        </svg>
      </div>

      <!-- Roll number input with number icon -->
      <div class="relative">
        <input type="text" name="app_root_input_roll" placeholder="Enter your roll number"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-400 transition-all duration-300 shadow-sm" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
          class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2">
          <path fill-rule="evenodd"
            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
            clip-rule="evenodd" />
          <path fill-rule="evenodd"
            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
            clip-rule="evenodd" />
        </svg>
      </div>

      <!-- Exam code input with code icon -->
      <div class="relative">
        <input type="text" name="app_root_input_examcode" placeholder="Enter exam code"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-400 transition-all duration-300 shadow-sm" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
          class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2">
          <path fill-rule="evenodd"
            d="M14.447 3.026a.75.75 0 0 1 .527.921l-4.5 16.5a.75.75 0 0 1-1.448-.394l4.5-16.5a.75.75 0 0 1 .921-.527ZM16.72 6.22a.75.75 0 0 1 1.06 0l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06L21.44 12l-4.72-4.72a.75.75 0 0 1 0-1.06Zm-9.44 0a.75.75 0 0 1 0 1.06L2.56 12l4.72 4.72a.75.75 0 0 1-1.06 1.06L.97 12.53a.75.75 0 0 1 0-1.06l5.25-5.25a.75.75 0 0 1 1.06 0Z"
            clip-rule="evenodd" />
        </svg>
      </div>

      <div class="flex justify-end">
        <button name="app_root_input_submit"
          class="w-22 bg-blue-500 text-white font-semibold py-1 rounded-sm hover:bg-blue-600 transition-colors duration-300 shadow-lg cursor-pointer flex items-center justify-center gap-2">
          Next
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
            <path fill-rule="evenodd"
              d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z"
              clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
    </form>
    <div class="text-center text-gray-400 text-sm">
      <p>BIAM Foundation &copy; 2025</p>
    </div>
  </div>
</div>


<a href="#/users">Goto Home</a>