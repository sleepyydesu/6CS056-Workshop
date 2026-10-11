<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>
    <h1>Edit Course</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/courses/{{ $course->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Course Name</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $course->name) }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"
                      required>{{ old('description', $course->description) }}</textarea>
        </div>

        <div>
            <label for="duration">Duration (weeks)</label>
            <input type="number" id="duration" name="duration"
                   value="{{ old('duration', $course->duration) }}"
                   min="1" required>
        </div>

        <div>
            <label for="fee">Fee</label>
            <input type="number" id="fee" name="fee"
                   value="{{ old('fee', $course->fee) }}"
                   min="0" step="0.01" required>
        </div>

        <div>
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty" required>
                <option value="Easy"
                    {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>
                    Easy
                </option>
                <option value="Medium"
                    {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>
                <option value="Hard"
                    {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>
                    Hard
                </option>
            </select>
        </div>

        <div>
            <label for="is_active">Active Course?</label>
            <select id="is_active" name="is_active" required>
                <option value="1"
                    {{ (string) old('is_active', (int) $course->is_active) === '1' ? 'selected' : '' }}>
                    Yes
                </option>
                <option value="0"
                    {{ (string) old('is_active', (int) $course->is_active) === '0' ? 'selected' : '' }}>
                    No
                </option>
            </select>
        </div>

        <button type="submit">Update Course</button>
    </form>

    <p><a href="/courses">Back to Courses</a></p>
</body>
</html>