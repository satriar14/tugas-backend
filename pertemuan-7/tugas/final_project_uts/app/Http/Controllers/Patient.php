<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient as ModelsPatient;

class Patient extends Controller
{
    //Show All Patients
    public function index()
    {
        $patients = ModelsPatient::getAllPatients();

        return response()->json($patients, $patients['status']);
    }

    //Show Detail Patient
    public function show($id)
    {
        $patient = ModelsPatient::getPatientById($id);


        return response()->json($patient, $patient['status']);
    }

    // Save Or Create Patient
    // I make validate request using Custom Request class
    public function store(StorePatientRequest $request)
    {
        //Validate Request
        $validate = $request->validated();

        // Check if validation fails
        if (!$validate) {
            $data = [
                "message" => $validate,
                "status" => 400
            ];

            return response()->json($data, 400);
        } else {
            // Create new patient
            $patient = ModelsPatient::createPatient($request);

            return response()->json($patient, $patient['status']);
        }
    }

    // Update patient
    // I make validate request using Custom Request class
    public function update(UpdatePatientRequest $request, $id)
    {
        //Validate Request
        $validate = $request->validated();

        if (!$validate) {
            $data = [
                "message" => $validate,
                "status" => 400
            ];

            return response()->json($data, 400);
        } else {
            // Update patient
            $patient = ModelsPatient::updatePatient($request, $id);

            return response()->json($patient, $patient['status']);
        }
    }

    //Delete patient By Id
    public function destroy($id)
    {
        // Delete patient
        $patient = ModelsPatient::deletePatient($id);

        return response()->json($patient, $patient['status']);
    }

    // Search patient by name
    public function search($name)
    {
        $patients = ModelsPatient::searchPatient($name);

        return response()->json($patients, $patients['status']);
    }

    //Filter By Status
    public function status($condition)
    {
        $patients = ModelsPatient::getPatientByStatus($condition);

        return response()->json($patients, $patients['status']);
    }
}
