<div class="p-2 w-1/5 bg-white shadow-md sm:rounded-lg mr-5 min-w-1/7">
    <ul class="flex flex-col space-y-2">
        @if (Auth::user()->profile === 'applicant' && !Auth::user()->cv()->count())
        <li class="p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
            <a href={{ route('user.cv.create') }}>Créer Mon CV</a>
        </li>
        @endif
        @if (Auth::user()->cv()->count())
        <li class="p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
            <a href={{ route('user.cv.show') }}>Visualiser Mon CV</a>
        </li>
        @endif
        @if (Auth::user()->profile === 'recruiter')
        <li class="p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
            <a href="{{ route('user.jobs') }}">Mes offres</a>
        </li>
        <li class="p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
            <a href="{{ route('user.applies') }}">Les demandes</a>
        </li>
        @endif
        @if (Auth::user()->profile === 'applicant')
        <li class="p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
            <a href="{{ route('user.applies') }}">Mes candidatures</a>
        </li>
        @endif
    </ul>
</div>
