 <script>
  import {onMount} from "svelte";
  
  let datetime = "";
  function updateDateTime() {
    const now = new Date();

    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12; // Convert 0 → 12 for 12-hour format
    hours = String(hours).padStart(2, "0");

    const options = {weekday: "short", year: "numeric", month: "short", day: "numeric"};
    const dateStr = now.toLocaleDateString("en-US", options);

    datetime = `${dateStr} ${hours}:${minutes}:${seconds} ${ampm}`;
  }

  onMount(() => {
    updateDateTime();
    const interval = setInterval(updateDateTime, 1000);
    return () => clearInterval(interval);
  });
  </script>

  <p class="text-sm" style="color: oklch(43.2% 0.232 292.759)"> {datetime} </p>