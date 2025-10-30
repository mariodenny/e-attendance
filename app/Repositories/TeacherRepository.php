<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Models\Teacher;
use App\Models\Clasroom;
use App\Models\Trial;

class TeacherRepository
{

    protected $model;
    protected $attendanceModel;
    protected $classroomModel;
    protected $trialModel;

    public function __construct(
        Teacher $model,
        Attendance $attendanceModel,
        Clasroom $classroomModel,
        Trial $trialModel
    ) {
        $this->model = $model;
        $this->attendanceModel = $attendanceModel;
        $this->classroomModel = $classroomModel;
        $this->trialModel = $trialModel;
    }


    public function findTeacherById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function storeNewTeacher(array $data)
    {
        return $this->model->create($data);
    }

    public function updateTeacher(int $id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function storeNewAttendance($data)
    {
        return $this->attendanceModel->create($data);
    }

    public function countTeacherClasses(int $teacherId)
    {

        return $this->classroomModel->where('teacher_id', $teacherId)->count();
    }

    public function countStudents($teacherId)
    {
        return $this->classroomModel->where('teacher_id', $teacherId)->count();
    }

    public function getTeacherDataByUserId($userId)
    {
        return $this->model->where('user_id', $userId)->firstOrFail();
    }

    // TODO :: Flow teacher trial
    public function getJoinTrialByTeacherId(int $teacherId, $month)
    {
        return $this->trialModel->with(['teacher', 'module'])
            ->where('teacher_id', $teacherId)
            ->where('status', 'JOIN')
            ->whereNull('feedbacks')
            ->whereMonth('date', $month)
            ->get();
    }

    public function updateFeedback($trialId, $feedback)
    {
        return $this->trialModel->where('id', $trialId)->update(
            [
                'feedbacks' => $feedback
            ]
        );
    }
}
