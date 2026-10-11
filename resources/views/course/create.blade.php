<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>
    <h1>Create Course</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/courses" method="POST">
        @csrf

        <div>
            <label for="name">Course Name</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"
                      required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="duration">Duration (weeks)</label>
            <input type="number" id="duration" name="duration"
                   value="{{ old('duration') }}" min="1" required>
        </div>

        <div>
            <label for="fee">Fee</label>
            <input type="number" id="fee" name="fee"
                   value="{{ old('fee') }}" min="0"
                   step="0.01" required>
        </div>

        <div>
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty" required>
                <option value="">Select difficulty</option>
                <option value="Easy"
                    {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>
                    Easy
                </option>
                <option value="Medium"
                    {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>
                <option value="Hard"
                    {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>
                    Hard
                </option>
            </select>
        </div>

        <div>
            <label for="is_active">Active Course?</label>
            <select id="is_active" name="is_active" required>
                <option value="1"
                    {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                    Yes
                </option>
                <option value="0"
                    {{ old('is_active') == '0' ? 'selected' : '' }}>
                    No
                </option>
            </select>
        </div>

        <button type="submit">Create Course</button>
    </form>

    <p><a href="/courses">Back to Courses</a></p>
</body>
</html>