<x-frontend-layout>
    @if ($about)
        <x-frontend.sections.hero :about="$about" />
        <x-frontend.sections.about :about="$about" />
    @else
        <p>The portfolio owner has yet to add an about section</p>
    @endif

    @if ($skills)
        <x-frontend.sections.skills :skills="$skills" />
    @else
        <p>The portfolio owner has yet to add a skills section</p>
    @endif

    @if ($projects)
        <x-frontend.sections.projects :projects="$projects" />
    @else
        <p>The portfolio owner has yet to add an projects section</p>
    @endif

    @if ($contact)
        <x-frontend.sections.contact :contact="$contact" />
    @else
        <p>The portfolio owner has yet to add a contact section</p>
    @endif
</x-frontend-layout>
