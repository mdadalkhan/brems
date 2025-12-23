<script lang="ts">
   import Clock from "../../components/Clock.svelte"
   let roll = "1200013"
   let name = "Adal Khan"
</script>


 <div class="min-h-screen flex justify-center items-start bg-gray-100">
  <div class="bg-white p-6 shadow-xl rounded-sm w-full max-w-2xl mt-[60px]">

    <div class="flex items-center space-x-4 mb-8">
      <img class="w-16 h-16" src="../build/biam.svg" alt="App logo" />
      <div>
        <p class="text-xl font-bold">Recruitment Exam Management System</p>
        <p class="text-gray-500 text-md">BIAM Foundation, Dhaka</p>
        <Clock />
      </div>
    </div>
      <div class="rouded-lg"> <!-- Type for Bangla -->
        <p class="text-xl bg-green-900 text-gray-300 text-center p-1 rounded-sm" style="font-family: Noto Sans Bengali;"> বাংলা টাইপিং পরীক্ষার নির্দেশনা।  </p>
        <ul style="font-family: Noto Sans Bengali;" class="list-disc mx-6 my-2 text-pink-800">
           <li>আপনার নাম ও রোল নম্বর  যাচাই করুন।</li>
           <li>আপনার নাম ও রোল নম্বর সঠিক হলে Next বাটন প্রেস করুন।</li>
           <li>টাইপিং উইন্ডো প্রদর্শিত হলে Start বাটনে ক্লিক করে টাইপিং শুরু করুন।</li>
           <li>টাইপিং চলমান অবস্থায় টাইমার প্রদর্শিত হবে।</li>
           <li>ইউনিকোড ফন্টে টাইপিং করতে হবে।</li>
           <li>নির্ধারিত সময় শেষে টাইপিং টেক্সট বক্স স্বয়ংক্রিয়ভাবে লক হবে।</li>
           <li>লক হবার পর Submit বাটনে ক্লিক করুন।</li>
           <li>Submit বাটনে ক্লিক করার পর আপনি ইংরেজি টাইপিং উইন্ডো পাবেন।</li>
           <li>Start বাটনে ক্লিক করে ইংরেজি টাইপিং শুরু করুন।</li>
           <li>নির্ধারিত সময় শেষে টাইপিং টেক্সট বক্স স্বয়ংক্রিয়ভাবে লক হবে।</li>
           <li>লক হবার পর Submit বাটনে ক্লিক করুন এবং পরিশেষে logout বাটনে ক্লিক করুন।</li>
        </ul>
        <form>
                <div class="flex justify-end">
        <button
          class="w-24 bg-blue-500 text-white font-semibold py-1 rounded-sm hover:bg-blue-600 transition-colors duration-300 shadow-lg cursor-pointer flex items-center justify-center gap-2">
          Next
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
            <path fill-rule="evenodd"
              d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z"
              clip-rule="evenodd" />
          </svg>
        </button>
      </div>
        </form>
     </div>
  </div>

</div>




<a href="#/">Home</a>
<br>
<a href="#/users/usersbntype">Go to Bangla Type Windows</a>
