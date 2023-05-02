<x-app-layout>


        <div class="px-10 py-5 bg-white rounded-sm">
         <div>
            <h1 class="mb-5 text-xl font-bold text-slate-600 inline">Users </h1>
            <span class=" text-white text-light text-[10px] rounded-full bg-slate-500 px-2 py-1 "> {{Count($user)}}</span>
            <span class="ml-2 text-white text-light text-[10px] rounded-full bg-slate-500 px-2 py-1 "> Selected {{Count($user)}}</span>
         </div>
            @foreach($user as $user)
            <ul>
                <div class="p-3 text-sm font-semibold bg-blue-100 text-slate-500 my-1 border-b-2 flex justify-between">
                    <li class="text-left">
                    <input type="checkbox" name="{{ $user->name }}" id="{{ $user->id }}">
                    {{ $user->name }} - {{ $user->email }} - {{ $user->created_at }}
                    @if($user->is_admin === 1)
                        <span class=" text-white text-light rounded-full bg-red-500 px-2 py-1 "> Admin</span>
                    @else
                        <span class=" text-white text-light rounded-full bg-slate-500 px-2 py-1 "> Not_admin</span>
                    @endif
                    </li>
                    <form action="/users/{{ $user->id }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-sm rounded">
                        Delete
                        </button>
                    </form>
                </div>

            </ul>
            @endforeach
        </div>

</x-app-layout>
