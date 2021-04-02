@props(['job'])

<div class="mb-4 p-6 shadow-sm hover:shadow-md rounded-md bg-white">
    <div class="flex justify-between items-center mb-2">
        <small class="block font-bold">{{ $job->enterprise }}</small>
        <small class="block font-bold text-gray-400">Il y a 10 jours</small>
    </div>
    <h3 class="font-black text-xl text-gray-800 leading-tight mb-2">
        {{ $job->title }}
    </h3>
    <div class="flex space-x-8 mb-4">
        <div class="flex items-center">
            <x-heroicon-o-credit-card class="w-6 h-6 text-gray-500" />
            <small class="ml-2 font-semibold">
                {{ $job->salary }} F CFA/Mois
            </small>
        </div>
        <div class="flex items-center">
            <x-heroicon-o-briefcase class="w-6 h-6 text-gray-500" />
            <small class="ml-2 font-semibold">
                {{ $job->getWorkTypeAttribute($job->work_type) }}
            </small>
        </div>
        <div class="flex items-center">
            <x-heroicon-o-location-marker class="w-6 h-6 text-gray-500" />
            <small class="ml-2 font-semibold">{{ $job->location }}</small>
        </div>
    </div>
    <p class="text-gray-500">
        {{ Str::limit($job->description, 150) }}
        <a class="text-red-500" href="">lire plus</a>
    </p>
    <form method="POST" action={{ route('user.job.apply') }} class="mt-4">
        @csrf
        <input type="hidden" name="job_id" value={{ $job->id }} />
        <button type="submit"
            class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-white bg-red-400 hover:bg-red-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Postuler') }}</button>
    </form>
</div>
