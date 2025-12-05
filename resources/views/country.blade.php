<x-layout title="country">
    <x-ui.section title="country">
        <div>
            <input type="text" name="count" class="border">
            <x-ui.button>Paginate</x-ui.button>
        </div>

        @if (count($countries) < 1)
            Country not found
        @else
            <table class="m-auto w-full">
                <thead>
                    <tr class="grid grid-cols-[1fr_5fr_4fr_2fr] md:grid-cols-[1fr_8fr_2fr_1fr] bg-gray-800 text-white items-center">
                        <th class="py-1 text-left">ID</th>
                        <th class="text-left">Name</th>
                        <th>Top</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                        <tr class="grid grid-cols-[1fr_5fr_4fr_2fr] md:grid-cols-[1fr_8fr_2fr_1fr] odd:bg-white even:bg-gray-200 hover:bg-gray-600 hover:text-white cursor-pointer items-center">
                            <td class="py-1">{{ $country->id }}</td>
                            <td>{{ $country->name }}</td>
                            <td class="grid grid-cols-[20px_3vw_20px] gap-x-1 items-center justify-center">
                                <x-form.form action="{{ route('country.increment',$country)}} ">
                                    <x-ui.button type="submit"> - </x-ui.button>
                                </x-form.form>
                                <span class="text-center">{{ $country->top }}</span>
                                <x-form.form action="{{ route('country.increment',$country)}} ">
                                    <x-ui.button type="submit"> + </x-ui.button>
                                </x-form.form>
                            </td>
                            <td class="text-center">
                                <x-form.form action="{{ route('country.delete',$country)}} ">
                                    @method('DELETE')
                                    <x-ui.button> delete </x-ui.button>
                                </x-form.form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

                <table>
        @endif
        <div class="py-4">
            {{$countries->links()}}
        </div>
    </x-ui.section>
</x-layout>
