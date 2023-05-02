<x-app-layout>
    <div class=" mx-10 my-10  bg-white shadow-md shadow-gray-200">
  <h3 class="text-xl font-bold mb-4 py-3 px-10  border-b text-gray-700">Created project</h3>
  <form class="w-full mx-auto px-10" method="POST" action="/clients/{{ $client->id }}/edit">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
          Company
        </label>
        <input
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="company"
          type="text"
          name="company"
          value="{{ $client->company}}"
        />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
          VAT
        </label>
        <input
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="vat"
          type="text"
          name="vat"
          value="{{ $client->vat}}"
        />
        <x-input-error :messages="$errors->get('vat')" class="mt-2" />
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
          Address
        </label>
        <input
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="address"
          type="text"
          name="address"
          value="{{ $client->address}}"
        />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
      </div>
      <!-- Add Submit Button -->
      <div class="w-full px-3">
      <button class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 mb-5 rounded focus:outline-none focus:shadow-outline" type="submit">
        Update
      </button>
    </div>

    </div>
</form>
</div>

</x-app-layout>
