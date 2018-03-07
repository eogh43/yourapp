{{$user->name}}님, 어서오십쇼.
가입 확인을 위해 브라우저에서 다음 주소를 열어봐~:
{{route('users.confirm',$user->confirm_code)}}