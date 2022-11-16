<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'in_date_at',
        'out_date_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //Get All Patients with pagination, 10 per page
    public static function getAllPatients()
    {
        $patients = self::paginate(10);
        $data = [
            "message" => "Get All Patients",
            "data" => $patients,
            "status" => 200
        ];

        return $data;
    }

    //Get Patient by ID
    public static function getPatientById($id)
    {
        //Check if patient exists
        $patient = self::find($id);
        if ($patient) {
            $data = [
                "message" => "Get Patient by ID",
                "data" => $patient,
                "status" => 200
            ];
        } else {
            $data = [
                "message" => "Patient Not Found",
                "data" => null,
                "status" => 404
            ];
        }

        return $data;
    }

    //Create Patient
    public static function createPatient($request)
    {
        $patient = self::create($request->all());

        $data = [
            "message" => "Patient Created",
            "data" => $patient,
            "status" => 201
        ];

        return $data;
    }

    //Update Patient
    public static function updatePatient($request, $id)
    {
        $patient = self::find($id);
        //Check if patient exists
        if ($patient) {
            $patient->update($request->all());
            $data = [
                "message" => "Patient Updated",
                "data" => $patient,
                "status" => 200
            ];
        } else {
            $data = [
                "message" => "Patient Not Found",
                "data" => null,
                "status" => 404
            ];
        }

        return $data;
    }

    //Delete Patient
    public static function deletePatient($id)
    {
        $patient = self::find($id);
        if ($patient) {
            $patient->delete();
            $data = [
                "message" => "Patient Deleted",
                "data" => $patient,
                "status" => 200
            ];
        } else {
            $data = [
                "message" => "Patient Not Found",
                "data" => null,
                "status" => 404
            ];
        }

        return $data;
    }

    //Search Patient by Name
    public static function searchPatient($name)
    {
        $patients = self::where('name', 'like', '%' . $name . '%')->paginate(10);
        $data = [
            "message" => "Search Patient by Name",
            "data" => $patients,
            "status" => 200
        ];

        return $data;
    }

    //Get Patient by Status
    public static function getPatientByStatus($condition)
    {
        $patients = self::where('status', $condition)->paginate(10);
        $data = [
            "message" => "Get Patient by Status",
            "data" => $patients,
            "status" => 200
        ];

        return $data;
    }
}
