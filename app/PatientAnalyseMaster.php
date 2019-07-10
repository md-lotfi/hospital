<?php

namespace SP;

use Illuminate\Database\Eloquent\Model;

class PatientAnalyseMaster extends Model
{
    protected $table = 'patient_analyses_master';
    protected $primaryKey = 'id_pam';

    public static function getAnalyse($id_adm){
        return PatientAnalyseMaster::where('id_adm', $id_adm)
            ->join('patient_analyses', 'patient_analyses.id_pam', 'patient_analyses_master.id_pam')
            ->join('analyses', 'analyses.id_analyse', 'patient_analyses.id_analyse')
            ->get();
    }
}
