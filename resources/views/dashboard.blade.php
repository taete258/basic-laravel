<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12 px-6">
  <div class="overflow-x-auto">
      <div class="shadow-md overflow-hidden border-1 border-gray-200 sm:rounded-lg">
        <table class="table-fixed w-full text-sm divide-gray-200 ">
          <thead class="bg-indigo-200 ">
            <tr>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700 ">No.</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700 ">Name</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700">Email</th>
              <th  class="px-6 py-2 text-left text-md font-large text-indigo-700">Created At</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 table-auto">
            @php($i = 1)
            @foreach($users as $row)
            <tr>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm font-medium text-gray-900">{{$i++}}</div>
              </td>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm font-medium text-gray-900">{{$row -> name}}</div>
              </td>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm text-gray-900">{{$row -> email}}</div>
              </td>
              <td class="px-6 py-4 text-left ">
                <div class="text-sm text-gray-900">{{$row -> created_at-> diffForHumans()}}</div>
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
