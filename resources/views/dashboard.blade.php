<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12">
  <div class="overflow-x-auto flex justify-start">
    <div class="py-2 align-middle inline-block min-w-full md:w-auto sm:px-6 lg:px-6">
      <div class="shadow-md overflow-hidden border-1 border-gray-200 sm:rounded-lg">
        <table class=" min-w-full md:w-auto divide-y divide-gray-200 ">
          <thead class="bg-indigo-50 ">
            <tr>
              <th  class="px-4 py-2 text-left text-md font-large text-indigo-700 ">Name</th>
              <th  class="py-2 text-left text-md font-large text-indigo-700">Email</th>
              <th  class="py-2 text-center text-md font-large text-indigo-700">Created At</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 table-auto">
            @foreach($users as $row)
            <tr>
              <td class="px-6 py-4 text-left whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{$row -> name}}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 text-left whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$row -> email}}</div>
              </td>
              <td class="px-6 py-4 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$row -> created_at}}</div>
              </td>
            </tr>
            @endforeach
            

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</x-app-layout>
