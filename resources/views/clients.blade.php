<x-app-layout>
    <div class="mx-10 mt-10">
        <form action="/new-client" method="get">
            @csrf
            <button  class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 mb-5 rounded focus:outline-none focus:shadow-outline" type="submit">
                Create client
            </button>
        </form>
    </div>

    <div class=" mx-10 mb-10  bg-white shadow-md shadow-gray-200">
        <h3 class="text-xl font-bold mb-4 py-3 px-10  border-b border-gray-200 text-gray-700">Client list</h3>
        <div class=" max-w-screen-lg mx-5 mt-5  overflow-x-auto">
            <table class="w-full border-collapse table-auto ">
                <thead>
                <tr class="bg-white  border-y border-gray-200">
                    <th class="pr-6 pl-10 py-2 text-left text-gray-700 font-bold">Company</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-bold">VAT</th>
                    <th class="px-12 py-4 text-left text-gray-700 font-bold">Address</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-bold"></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($client as $client)
                    <tr class="border-y border-gray-200 bg-gray-100 ">
                        <td class="pr-6 pl-10 py-3 whitespace-nowrap text-gray-700 text-sm">{{ $client->company }}</td>
                        <td class="px-6 py-3 whitespace-nowrap text-gray-700 text-sm">{{ $client->vat }}</td>
                        <td class="px-12 py-3 whitespace-nowrap text-gray-700 text-sm">{{ $client->address }}</td> <!-- Updated class to px-12 for wider width -->
                        <td class="px-6 py-3 whitespace-nowrap text-gray-700 text-sm">
                                <a href="/clients/{{ $client->id }}/edit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 mr-1 rounded">
                                Edit
                                </a>
                            <form action="/clients/{{ $client->id }}}" class="inline-block" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
