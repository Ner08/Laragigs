<x-layout>
    <x-card class="!p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                    @foreach ($listings as $listing)
                        <x-manage-listings-card :listing="$listing" />
                    @endforeach
                @else
                    <h4>No listings found</h2>
                    @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
