@component('mail::message')
    # New Contact Message

    **Surname:** {{ $data['surname'] }}
    **First Name:** {{ $data['first_name'] }}
    **Email:** {{ $data['email'] }}
    **Phone:** {{ $data['phone'] }}
    **:** {{ $data['type'] }}

    ---

    ### Message:
    {{ $data['message'] }}

@endcomponent
