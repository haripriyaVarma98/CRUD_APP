<main class="px-2 mx-auto bg-gray-100 mb-5 border border-gray-200 p-6 rounded-xl">
  <form id="filter-list" class="w-full">
      <div class="flex flex-wrap -mx-3 mb-3 md:items-center">
          <div class="px-6 md:mb-0">
              <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="companyFilter">
                  Company filter
              </label>
              <x-company-dropdown id="companyFilter" name='companyFilter'
                  class="text-sm block py-1 px-1 leading-tight rounded focus:outline-none focus:bg-white cursor-pointer"
                  :companies="$companies" multiple />
          </div>
          <div class="px-6 md:mb-0 text-xs">
              <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="addressFilter">
                  Address filter
              </label>
              <div class="flex justify-center">
                  <div class="form-check form-check-inline">
                      <input
                          class="form-check-input form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                          type="radio" name="addressFilter" id="" value="no-address">
                      <label class="form-check-label inline-block text-gray-800 mr-3" for="">No
                          address</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input
                          class="form-check-input form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                          type="radio" name="addressFilter" id="" value="has-address">
                      <label class="form-check-label inline-block text-gray-800 mr-3" for="">Has
                          Address</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input
                          class="form-check-input form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                          type="radio" name="addressFilter" id="" value="single-address">
                      <label class="form-check-label inline-block text-gray-800 mr-3" for="">Single
                          Address</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input
                          class="form-check-input form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2"
                          type="radio" name="addressFilter" id="" value="multi-address">
                      <label class="form-check-label inline-block text-gray-800 mr-3" for="">Multiple
                          address</label>
                  </div>
              </div>
          </div>
      </div>
      <div class="md:flex">
          <div class="md:w-full">
              <button type="submit" id="submitFilter"
                  class='float-right bg-blue-400 hover:bg-blue-500 text-white md:items-center text-sm rounded py-2 px-2 mr-6'>Submit</button>
          </div>
      </div>
  </form>
</main>

<script type="text/javascript">
    $(document).ready(function() {
        new TomSelect('#companyFilter', {
            maxItems: 4,
        });
    });
</script>
