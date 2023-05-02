<x-app-layout>
    <div class=" mx-10 my-10  bg-white shadow-md shadow-gray-200">
  <h3 class="text-xl font-bold mb-4 py-3 px-10  border-b text-gray-700">Created project</h3>
  <form class="w-full mx-auto px-10" method="POST" action="/project/{{ $project->id }}/edit">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
          Title
        </label>
        <input
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="title"
          type="text"
          name="title"
          value="{{$project->title}}"
        />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>
      <div class="w-full px-3">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
    Description
  </label>
  <textarea
    class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
    id="description"
    name="description"
  >{{$project->description}}</textarea>
  <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="date">
          Date
        </label>
        <input
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="date"
          type="date"
          name="date"
          value="{{$project->date}}"
        />
        <x-input-error :messages="$errors->get('date')" class="mt-2" />
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="assigned_user">
          Assigned User
        </label>
        <select
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="assigned_user"
          name="assigned_user"
          value="{{$project->assigned_user}}"
        >
          <option value="" disabled selected>Select User</option>
          <option value="user1">User 1</option>
          <option value="user2">User 2</option>
          <!-- Add more options as needed -->
        </select>
        <x-input-error :messages="$errors->get('assigned_user')" class="mt-2" />
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="assigned_client">
          Assigned Client
        </label>
        <select
          class="appearance-none block w-full text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="assigned_client"
          name="assigned_client"
          value="{{$project->assigned_client}}"
        >
          <option value="" disabled selected>Select Client</option>
          <option value="client1">Client 1</option>
          <option value="client2">Client 2</option>
          <!-- Add more options as needed -->
        </select>
        <x-input-error :messages="$errors->get('assigned_client')" class="mt-2" />
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
        Status
        </label>
        <select
          class="appearance-none block w-full  text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="status"
          name="status"
          value="{{$project->status}}"
        >
          <option value="" disabled selected>statues</option>
          <option value="client1">Open</option>
          <option value="client2">Close</option>
          <!-- Add more options as needed -->
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
