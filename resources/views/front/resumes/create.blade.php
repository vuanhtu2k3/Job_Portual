@extends('front.layouts.app')

@section('main')
    <div class="container py-5">
        <h2 class="text-center mb-4">Tạo CV</h2>
        <form action="" id="cvForm" name="cvForm" method="POST" class="shadow p-4 bg-white rounded">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>


            <div class="mb-4">
                <label for="" class="mb-2">Description<span class="req">*</span></label>
                <textarea class="textarea" name="summary" id="summary" cols="5" rows="5" placeholder="Description"></textarea>
                <p></p>
            </div>

            <div class="mb-4">
                <label for="" class="mb-2">Kinh nghiệm:</label>
                <select name="experience" id="experience">
                    <option value="1">1 Year</option>
                    <option value="2">2 Years</option>
                    <option value="3">3 Years</option>
                    <option value="4">4 Years</option>
                    <option value="5">5 Years</option>
                    <option value="6">6 Years</option>
                    <option value="7">7 Years</option>
                    <option value="8">8 Years</option>
                    <option value="9">9 Years</option>
                    <option value="10">10 Years</option>
                    <option value="10_plus">10+ Years</option>
                </select>
                <p></p>
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">Học vấn:</label>
                <textarea id="education" name="education" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Kỹ năng:</label>
                <textarea id="skills" name="skills" class="form-control" rows="3" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Tạo CV</button>
            </div>
        </form>
    </div>
@endsection

@section('customJs')
    <script>
        $('#cvForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('account.saveCV') }}",
                type: 'POST',
                data: $("#cvForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('account.profile') }}";
                    }
                }
            });
        });
    </script>
@endsection
