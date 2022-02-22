<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12 px-6">
  <div class="overflow-x-auto">
      <div class="shadow-md overflow-auto border-1 border-gray-200 sm:rounded-lg">
        <table class="table-fixed w-full text-sm divide-gray-200 ">
          <thead class="bg-indigo-200 ">
            <tr>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700 ">No.</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700 ">Task Name</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700">Description</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700">Status</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700"></th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 table-auto">
            @php($i = 1)
            @foreach($tasks as $row)
            <tr>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm font-medium text-gray-900">{{$i++}}</div>
              </td>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm font-medium text-gray-900">{{$row -> name}}</div>
              </td>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm text-gray-900">{{$row -> description ?? '-'}}</div>
              </td>
              <td class="px-6 py-4 text-left ">
                <x-jet-badge class="{{$row -> state ==  'Archived' ? 'bg-green-600' : 'bg-red-600' }}  text-white">{{$row -> state}}</x-jet-badge>
              </td>
              <td class="px-6 py-4 text-left">
                <x-jet-button class="bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-400"> Proceed </x-jet-button>
                <x-jet-danger-button > Delete </x-jet-button>
              </td>
            </tr>
            @endforeach
            

            <!-- More people... -->
          </tbody>
        </table>
      </div>
 
  </div>
</div>

</x-app-layout>
