<script>
  /**
   * @author <mdadalkhan@gmail.com>
   * Created: 24/12/2025
   * */

  export let status; // This vaiable receive status code as props from inertia.js

  const title = {
    503: '503: Service Unavailable',
    500: '500: Server Error',
    404: '404: Page Not Found',
    403: '403: Forbidden',
  }[status] ?? 'An Error Occurred';

  const description = {
    503: 'Sorry, we are doing some maintenance. Please check back soon.',
    500: 'Whoops, something went wrong on our servers.',
    404: 'Sorry, the page you are looking for could not be found.',
    403: 'Sorry, you are forbidden from accessing this page.',
  }[status] ?? 'An unexpected error has occurred.';
</script>

<svelte:head>
  <title>{title}</title>
</svelte:head>

<div class="flex min-h-screen items-center justify-center bg-gray-100 font-sans text-gray-700 text-center">
  <div class="max-w-[400px] p-8">
    <h1 class="text-[6rem] font-extrabold leading-none text-gray-300 m-0">
      {status}
    </h1>
    <h2 class="text-2xl mt-[1rem] mb-4">
      {title}
    </h2>
    <p class="text-gray-500 mb-8">
      {description}
    </p>
    <a 
      href="/" 
      class="inline-block px-3 py-2 bg-indigo-600 text-white font-medium rounded-md no-underline hover:bg-indigo-700 transition-colors"
    >
      Return Home
    </a>
    <p class="mt-[1rem] text-sm text-sky-900 font-bold">BIAM Foundation &copy; 2025</p>
  </div>
</div>