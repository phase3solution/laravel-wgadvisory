<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:400,500,700");

        * {
            font-family: "Roboto", sans-serif !important;
            line-height: 1.1;
            font-size: 14px;
        }

        strong {
            font-weight: 700 !important;
        }

        table {
            width: 100%;
            margin-bottom: 1.3rem !important;
        }

        ul {
            padding: 0;
            margin: 0;
            padding-left: 15px;
        }

        .bold {
            font-weight: 700 !important;
        }

        .title {
            font-size: 18px !important;
            text-transform: uppercase;
        }

        .content {
            font-size: 13px !important;
        }

        .heading {
            font-size: 17px !important;
            color: #fff;
            padding: 0 !important;
        }

        .subhead {
            font-size: 16px !important;
            color: #fff;
        }

        .gray {
            background-color: #585858;
            color: #fff;
        }

        .black {
            background-color: #000;
            color: #fff;
        }

        .blue {
            background-color: #001f5f;
            color: #fff;
        }

        .technology {
            background-color: #6f6f00;
            color: #fff;
        }

        .people {
            background-color: #400080;
            color: #fff;
        }

        .center {
            text-align: center;
        }

        .semibold {
            font-weight: 600;
        }

        .table td {
            padding: 5px 10px !important;
        }

        .table td.intro {
            padding: 5px 10px 0px 10px !important;
        }

        .table td.intro p {
            margin-bottom: 8px;
        }

        .table.rtoTable {
            margin-bottom: 0 !important;
        }

        .table.rtoTable td.fixedbg {
            border: none !important;
            padding: 0 !important;
            height: 32px;
            width: 50px;
        }

        td.nopadding {
            padding: 0 !important;
        }

        .color-five {
            background-color: #abcdef;
        }

        .color-four {
            background-color: #64bc46;
        }

        .color-three {
            background-color: #ffdc5d;
        }

        .color-two {
            background-color: #f77e28;
        }

        .color-one {
            background-color: #df5e5f;
        }

        .color-5 {
            background-color: #abcdef;
        }

        .color-4 {
            background-color: #64bc46;
        }

        .color-3 {
            background-color: #ffdc5d;
        }

        .color-2 {
            background-color: #f77e28;
        }

        .color-1 {
            background-color: #df5e5f;
        }

        .table-bordered td.fixedbg {}

        .table-bordered td {
            border: 1px solid #6e7275 !important;
        }

        .table-bordered td.noborder {
            border: 0px !important;
        }

        .logo {
            height: 90px;
            width: auto
        }

        .small {
            font-size: 13px !important;
        }

        @page {
            margin: 35px 25px 40px;
        }

        .light-gray {
            background-color: #d9d9d9;
        }

        .m0 {
            margin: 0 !important;
        }

        .avoidBreak {
            page-break-inside: avoid !important;
            margin: 4px 0 4px 0;
        }

    </style>

            

</head>

<body>
    <div class="tableContainer">
        <table class="table table-bordered">
            <tbody>

                <tr>
                    <td class="subhead black align-middle" colspan="3" rowspan="2">Departmental Business Continuity
                        Report<br>{{ date('F jS, Y', strtotime($department->updated_at))  }}</td>
                    <td class="heading black center align-middle bold" rowspan="2">{{$department->name}}</td>
                    <td class="center light-gray" style="width:50px">Staff</td>
                    <td class="black center" style="width:130px">RTO</td>
                </tr>



                <tr>
                    <td class="center light-gray">
                        @if ($department->biaDepartmentResult)
                            {{$department->biaDepartmentResult->staff}}
                        @else 
                            --
                        @endif
                    </td>
                    <td class="nopadding">
                        <table class="table table-bordered rtoTable">
                            <tbody>
                                <tr>
                                    <td class="fixedbg color-five">&nbsp;</td>
                                    <td class="noborder">2-4 weeks</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="small intro" colspan="5" rowspan="3">
                        @if ($department->biaDepartmentResult)
                            {{$department->biaDepartmentResult->high_level_description}}
                        @else 
                            --
                        @endif
                    </td>
                    <td class="nopadding">
                        <table class="table table-bordered rtoTable">
                            <tbody>
                                <tr>
                                    <td class="fixedbg color-four">&nbsp;</td>
                                    <td class="noborder">7-days</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="nopadding">
                        <table class="table table-bordered rtoTable">
                            <tbody>
                                <tr>
                                    <td class="fixedbg color-three">&nbsp;</td>
                                    <td class="noborder">3-days &nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="nopadding">
                        <table class="table table-bordered rtoTable">
                            <tbody>
                                <tr>
                                    <td class="fixedbg color-two">&nbsp;</td>
                                    <td class="noborder">24-hours</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="black" colspan="5">CRITICAL FUNCTIONS AND RECOVERY TIME OBJECTIVES </td>
                    <td class="nopadding">
                        <table class="table table-bordered rtoTable">
                            <tbody>
                                <tr>
                                    <td class="fixedbg color-one">&nbsp;</td>
                                    <td class="noborder">0-4&nbsp;hours</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="gray" style="width:25%;">Service/Process</td>
                    <td class="gray" style="width:5%;">RTO</td>
                    <td class="gray">Impact</td>
                    <td class="gray">Manual Processes/Alternatives</td>
                </tr>
            </thead>
            <tbody>

                @if ($department->biaService)
                    @foreach ($department->biaService as $service)

                        <tr>
                            <td class="blue small text-uppercase">{{$service->name}}
                                @php
                                    $critical_rating_color = "color-five";
                                @endphp

                                @if ($service->biaServiceResult)
                                    @if ($service->biaServiceResult->criticality_rating)
                                        @php
                                            if($service->biaServiceResult->criticality_rating >0 && $service->biaServiceResult->criticality_rating <=20){
                                                $critical_rating_color = "color-five";
                                            }elseif ($service->biaServiceResult->criticality_rating >21 && $service->biaServiceResult->criticality_rating <=40) {
                                                $critical_rating_color = "color-four";
                                            }elseif ($service->biaServiceResult->criticality_rating >41 && $service->biaServiceResult->criticality_rating <=60) {
                                                $critical_rating_color = "color-three";
                                            }elseif ($service->biaServiceResult->criticality_rating >61 && $service->biaServiceResult->criticality_rating <=80) {
                                                $critical_rating_color = "color-two";
                                            }elseif ($service->biaServiceResult->criticality_rating >80) {
                                                $critical_rating_color = "color-one";
                                            }
                                        @endphp
                                    @endif
                                @endif 

                            </td>
                            <td class="{{$critical_rating_color}}">&nbsp;</td>
                            <td class="blue small">
                                @if ($service->biaServiceResult)
                                    @if ($service->biaServiceResult->spe_critical_impact_comments)
                                        {{$service->biaServiceResult->spe_critical_impact_comments}}
                                    @endif
                                @else 
                                    -- 
                                @endif
                            </td>
                            <td class="blue small">
                                @if ($service->biaServiceResult)
                                    @if ($service->biaServiceResult->activity)
                                        {{$service->biaServiceResult->activity}}
                                    @endif
                                @else 
                                    -- 
                                @endif

                            </td>
                        </tr>
                        
                    @endforeach
                @endif

               
           
            </tbody>
        </table>
        <div class="avoidBreak">
            <div style="padding: 20px;margin-bottom: 10px;width: 60%; border:1px solid #000;" class="technology">
                <span class="title">SUPPORTING APPLICATIONS, DATA, AND TECHNOLOGY</span><br><span
                    class="content">Critical Functions and Recovery Time Objectives (RTO), or the time by which
                    an organization must be able to resume operations, is a major factor in planning recovery. The
                    following worksheets list the critical applications, data, and supporting technology required by the
                    organization for continued operation; including where they're located, backup frequency, and access
                    details. </span></div>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td colspan="5" class="technology">VITAL RECORDS, DATABASES, FORMS AND DOCUMENTS</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="gray">Vital Record</td>
                        <td class="gray">Description</td>
                        <td class="gray">Storage Location</td>
                        <td class="gray">Format</td>
                        <td class="gray">Updated</td>
                    </tr>
                </thead>
                <tbody>

                    @if($department->biaDepartmentResult)
                        @php
                            $spe_vital_records_files = json_decode($department->biaDepartmentResult->spe_vital_records_files, true);
                            $spe_vital_records_description = json_decode($department->biaDepartmentResult->spe_vital_records_description, true);
                            $spe_vital_records_location = json_decode($department->biaDepartmentResult->spe_vital_records_location, true);
                            $spe_vital_records_format = json_decode($department->biaDepartmentResult->spe_vital_records_format, true);
                            $spe_vital_records_updated = json_decode($department->biaDepartmentResult->spe_vital_records_updated, true);

                        @endphp

                    @endif

                    @if ($department->se_row_vital_record)
                        @for ($i = 0; $i < $department->se_row_vital_record; $i++)
                            <tr>

                                <td class="small">
                                    @if($department->biaDepartmentResult && $spe_vital_records_files)
                                        {{$spe_vital_records_files[$i]}}
                                    @else 
                                        --
                                    @endif
                                </td>
                                <td class="small">
                                    @if($department->biaDepartmentResult && $spe_vital_records_description)
                                        {{$spe_vital_records_description[$i]}}
                                    @else 
                                        --
                                    @endif
                                </td>
                                <td class="small">
                                    @if($department->biaDepartmentResult && $spe_vital_records_location)
                                        {{$spe_vital_records_location[$i]}}
                                    @else 
                                        --
                                    @endif
                                </td>
                                <td class="small">
                                    @if($department->biaDepartmentResult && $spe_vital_records_format)
                                        {{$spe_vital_records_format[$i]}}
                                    @else 
                                        --
                                    @endif
                                </td>
                                <td class="small">
                                    @if($department->biaDepartmentResult && $spe_vital_records_updated)
                                        {{$spe_vital_records_updated[$i]}}
                                    @else 
                                        --
                                    @endif
                                </td>
                            </tr>

                        @endfor
                    @endif
                  
                </tbody>
            </table>
        </div>
        <table class="table table-bordered m0">
            <tbody>
                <tr>
                    <td colspan="4" class="technology">RECOVERY POINT OBJECTIVES (RPO)</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="gray" style="width:30%;">Service</td>
                    <td class="gray" style="width:60px;text-align:center;">RPO</td>
                    <td class="gray">Process to Recreate Data (if any)</td>
                </tr>
            </thead>

            <tbody>
                @if ($department->biaService)

                    @foreach ($department->biaService as $service)

                        <tr>
                            <td class="small">{{$service->name}}</td>

                            <td class="small  @if (isset($service->biaServiceResult->spe_rpo)) color-{{$service->biaServiceResult->spe_rpo}} @else color-1  @endif " style="text-align:center;">
                               @if ($service->biaServiceResult)
                                    @if ($service->biaServiceResult->spe_rpo)

                                        @if ($service->biaServiceResult->spe_rpo == 0)
                                            0-4 hours

                                        @elseif($service->biaServiceResult->spe_rpo == 1)
                                            1-day
                                        @elseif($service->biaServiceResult->spe_rpo == 2)
                                            3-days
                                        @elseif($service->biaServiceResult->spe_rpo == 3)
                                            1-week
                                        @endif
                                        
                                    @endif
                                   
                               @endif
                            </td>



                            <td class="small"> 
                                @if ($service->biaServiceResult)

                                    @if ($service->biaServiceResult->spe_process_tomanually)

                                        {{$service->biaServiceResult->spe_process_tomanually}}
                                        
                                    @endif
                               
                                @endif
                            </td>
                        </tr>
                        
                    @endforeach
                    
                @endif
                
             
            </tbody>

        </table>
        <table class="table table-bordered m0">
            <tbody>
                <tr>
                    <td colspan="4" class="technology">TECHNOLOGY REQUIREMENTS</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="gray">Type</td>
                    <td class="gray">Normal</td>
                    <td class="gray">Minimal (MSL)</td>
                    <td class="gray">Comments</td>
                </tr>
            </thead>
            <tbody>

                @if($department->biaDepartmentResult)
                    @php
                        $spe_technology_computers = json_decode($department->biaDepartmentResult->spe_technology_computers, true);
                        $spe_technology_normal = json_decode($department->biaDepartmentResult->spe_technology_normal, true);
                        $spe_technology_msl = json_decode($department->biaDepartmentResult->spe_technology_msl, true);
                        $spe_technology_function = json_decode($department->biaDepartmentResult->spe_technology_function, true);
                        $spe_technology_support_contact = json_decode($department->biaDepartmentResult->spe_technology_support_contact, true);
                        $spe_technology_comments = json_decode($department->biaDepartmentResult->spe_technology_comments, true);
                    @endphp

                @endif

                @if ($department->se_row_technology_required)
                    @for ($i = 0; $i < $department->se_row_technology_required; $i++)
                        <tr>

                            <td class="small">
                                @if($department->biaDepartmentResult && $spe_technology_computers)
                                    {{$spe_technology_computers[$i]}}
                                @else 
                                    --
                                @endif
                            </td>
                            <td class="small">
                                @if($department->biaDepartmentResult && $spe_technology_normal)
                                    {{$spe_technology_normal[$i]}}
                                @else 
                                    --
                                @endif
                            </td>
                            <td class="small">
                                @if($department->biaDepartmentResult && $spe_technology_msl)
                                    {{$spe_technology_msl[$i]}}
                                @else 
                                    --
                                @endif
                            </td>
                            <td class="small">

                                @if($department->biaDepartmentResult && $spe_technology_comments)
                                    {{$spe_technology_comments[$i]}}
                                @else 
                                    --
                                @endif

                            </td>
                        </tr>

                    @endfor
                @endif

              
             
            </tbody>
        </table>
        <table class="table table-bordered m0">
            <tbody>
                <tr>
                    <td colspan="5" class="technology">UPSTREAM DEPENDENCIES SUPPORTING CRITICAL SERVICES/PROCESSES
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="gray">Services/Processes</td>
                    <td class="gray">IT Services</td>
                    <td class="gray">Desktop</td>
                    <td class="gray">Cloud</td>
                    <td class="gray">Other</td>
                </tr>
            </thead>
            <tbody>
               @if ($department->biaService)

                @foreach ($department->biaService as $service)
                    <tr>
                        <td class="small">{{$service->name}}</td>
                        <td class="small">
                            @php
                                $spe_upstream_dependencies = array();
                                if($service->biaServiceResult){
                                    if($service->biaServiceResult->spe_upstream_dependencies){

                                        $spe_upstream_dependencies = json_decode($service->biaServiceResult->spe_upstream_dependencies, true);

                                    }
                                }
                            @endphp

                           @if (!empty($spe_upstream_dependencies))

                                @foreach ($spe_upstream_dependencies as $spe_upstream_dependency)

                                    @if ($spe_upstream_dependency == 1)
                                    ADP Report Smith,
                                    @elseif($spe_upstream_dependency == 2)
                                    Application Services (ArcGIS Server),
                                    @elseif($spe_upstream_dependency == 3)
                                    pplication Services (Burnside Mobile),
                                    @elseif($spe_upstream_dependency == 4)
                                    Application Services (CityWorks),
                                    @elseif($spe_upstream_dependency == 5)
                                    Application Services (CodeTwo),
                                    @elseif($spe_upstream_dependency == 6)
                                    Application Services (GeoCortex),
                                    @elseif($spe_upstream_dependency == 7)
                                    Application Services (InfoHR),
                                    @elseif($spe_upstream_dependency == 8)
                                    Application Services (LaserFiche + Weblink),
                                    @elseif($spe_upstream_dependency == 9)
                                    Application Services (Maestro),
                                    @elseif($spe_upstream_dependency == 10)
                                    Application Services (Municipal Data Works),
                                    @elseif($spe_upstream_dependency == 11)
                                    Application Services (Orchid),
                                    @elseif($spe_upstream_dependency == 12)
                                    Application Services (Protege),
                                    @elseif($spe_upstream_dependency == 13)
                                    Application Services (Sage Intelligence Report Viewer),
                                    @elseif($spe_upstream_dependency == 14)
                                    Application Services (TimeManager),
                                    @elseif($spe_upstream_dependency == 15)
                                    Application Services (Wellspring Print Boss),
                                    @elseif($spe_upstream_dependency == 16)
                                    Application Services (Winfuel),
                                    @elseif($spe_upstream_dependency == 17)
                                    Application Services (WinPAK),
                                    @elseif($spe_upstream_dependency == 18)
                                    Avigilon Control Center/Cameras,
                                    @elseif($spe_upstream_dependency == 19)
                                    Blackberry Enterprise Server,
                                    @elseif($spe_upstream_dependency == 20)
                                    CellAsyst,
                                    @elseif($spe_upstream_dependency == 21)
                                    CiscoAnyConnectVPN,
                                    @elseif($spe_upstream_dependency == 22)
                                    Database Services (GeoCortex),
                                    @elseif($spe_upstream_dependency == 23)
                                    Database Services (GISSQL),
                                    @elseif($spe_upstream_dependency == 24)
                                    Database Services (MS Access),
                                    @elseif($spe_upstream_dependency == 25)
                                    Database Services (SQL),
                                    @elseif($spe_upstream_dependency == 26)
                                    Email (Microsoft Exchange) + Weblink,
                                    @elseif($spe_upstream_dependency == 27)
                                    File Services (File Shares),
                                    @elseif($spe_upstream_dependency == 28)
                                    Internet Access,
                                    @elseif($spe_upstream_dependency == 29)
                                    LogMeIn,
                                    @elseif($spe_upstream_dependency == 30)
                                    Network Access,
                                    @elseif($spe_upstream_dependency == 31)
                                    Print/Fax Service,
                                    @elseif($spe_upstream_dependency == 32)
                                    SFTP(File Transfers),
                                    @elseif($spe_upstream_dependency == 33)
                                    Telephone (Cellular),
                                    @elseif($spe_upstream_dependency == 34)
                                    Telephone (ShoreTel System),
                                    @elseif($spe_upstream_dependency == 35)
                                    ZendTo (File Transfers)
                                   
                                        
                                    @endif
                                    
                                @endforeach
                               
                           @endif
                            


                        </td>
                        <td class="small">
                            @php
                                $spe_desktop_applications = array();
                                if($service->biaServiceResult){
                                    if($service->biaServiceResult->spe_desktop_applications){

                                        $spe_desktop_applications = json_decode($service->biaServiceResult->spe_desktop_applications, true);

                                    }
                                }
                            @endphp

                        @if (!empty($spe_desktop_applications))

                                @foreach ($spe_desktop_applications as $spe_desktop_application)

                                    @if ($spe_desktop_application == 1)
                                    Access Database,
                                    @elseif($spe_desktop_application == 2)
                                    ACT!,
                                    @elseif($spe_desktop_application == 3)
                                    Adobe Pro DC,
                                    @elseif($spe_desktop_application == 4)
                                    Adobe Reader DC,
                                    @elseif($spe_desktop_application == 5)
                                    ADP,
                                    @elseif($spe_desktop_application == 6)
                                    ADP Report Smith,
                                    @elseif($spe_desktop_application == 7)
                                    APC/Liebert Alerting,
                                    @elseif($spe_desktop_application == 8)
                                    ArcGIS Desktop,
                                    @elseif($spe_desktop_application == 9)
                                    ArcGIS Pro,
                                    @elseif($spe_desktop_application == 10)
                                    AutoCAD Civil3D,
                                    @elseif($spe_desktop_application == 11)
                                    Avigilon Control Center/Cameras,
                                    @elseif($spe_desktop_application == 12)
                                    CAD (EWSWA),
                                    @elseif($spe_desktop_application == 13)
                                    Clinical Connect,
                                    @elseif($spe_desktop_application == 14)
                                    CODE-STAT,
                                    @elseif($spe_desktop_application == 15)
                                    Email (Microsoft Exchange) + Weblink,
                                    @elseif($spe_desktop_application == 16)
                                    FitPro,
                                    @elseif($spe_desktop_application == 17)
                                    GeoCortex Report Designer,
                                    @elseif($spe_desktop_application == 18)
                                    GeoCortex Workflow Designer,
                                    @elseif($spe_desktop_application == 19)
                                    GeoExpress (LizardTech)
                                    @elseif($spe_desktop_application == 20)
                                    Geologix (GPS Software),
                                    @elseif($spe_desktop_application == 21)
                                    GEOWare,
                                    @elseif($spe_desktop_application == 22)
                                    GridSmart,
                                    @elseif($spe_desktop_application == 23)
                                    InfoHR,
                                    @elseif($spe_desktop_application == 24)
                                    Laserfiche + Weblink,
                                    @elseif($spe_desktop_application == 25)
                                    LogMeIn,
                                    @elseif($spe_desktop_application == 26)
                                    MESH,
                                    @elseif($spe_desktop_application == 27)
                                    Microsoft Office 2019,
                                    @elseif($spe_desktop_application == 28)
                                    NexTalk TextNet Client,
                                    @elseif($spe_desktop_application == 29)
                                    PriijectorMMX,
                                    @elseif($spe_desktop_application == 30)
                                    Protege,
                                    @elseif($spe_desktop_application == 31)
                                    Sage 300 Accounting (Accpac),
                                    @elseif($spe_desktop_application == 32)
                                    Synchro Traffic Software,
                                    @elseif($spe_desktop_application == 33)
                                    TES Map,
                                    @elseif($spe_desktop_application == 34)
                                    TextNet,
                                    @elseif($spe_desktop_application == 35)
                                    Wellspring Print Boss,
                                    @elseif($spe_desktop_application == 36)
                                    Winfuel,
                                    @elseif($spe_desktop_application == 37)

                                    Zoom
                                        
                                    @endif
                                    
                                @endforeach
                            
                        @endif
                        </td>

                        <td class="small">
                            @php
                            $spe_cloud_providers = array();
                            if($service->biaServiceResult){
                                if($service->biaServiceResult->spe_cloud_providers){

                                    $spe_cloud_providers = json_decode($service->biaServiceResult->spe_cloud_providers, true);

                                }
                            }
                        @endphp

                    @if (!empty($spe_cloud_providers))

                            @foreach ($spe_cloud_providers as $spe_cloud_provider)

                                @if ($spe_cloud_provider == 1)
                                Activty Pro (SPH),
                                @elseif($spe_cloud_provider == 2)
                                Agora Pulse,
                                @elseif($spe_cloud_provider == 3)
                                ArcGIS Online,
                                @elseif($spe_cloud_provider == 4)
                                Canva,
                                @elseif($spe_cloud_provider == 5)
                                CCAC-HPG (SPH),
                                @elseif($spe_cloud_provider == 6)
                                CIBC CMO,
                                @elseif($spe_cloud_provider == 7)
                                CIBC Online,
                                @elseif($spe_cloud_provider == 8)
                                CIBC PWM,
                                @elseif($spe_cloud_provider == 9)
                                CIRA (DNS),
                                @elseif($spe_cloud_provider == 10)
                                CityWide,
                                @elseif($spe_cloud_provider == 11)
                                Clinical Connect,
                                @elseif($spe_cloud_provider == 12)
                                Debit/Credit Machine (EWSWA),
                                @elseif($spe_cloud_provider == 13)
                                eHealth (SPH and EMS),
                                @elseif($spe_cloud_provider == 14)
                                eSolutions Bids and Tenders,
                                @elseif($spe_cloud_provider == 15)
                                eSolutions County Connect
                                @elseif($spe_cloud_provider == 16)
                                eSolutions eclaims,
                                @elseif($spe_cloud_provider == 17)
                                eSolutions Form Builder,
                                @elseif($spe_cloud_provider == 18)
                                eSolutions Recruit Right,
                                @elseif($spe_cloud_provider == 19)
                                GeoLogic (GCS),
                                @elseif($spe_cloud_provider == 20)
                                GreenShield,
                                @elseif($spe_cloud_provider == 21)
                                Harvard Manage Mentor (Online Training),
                                @elseif($spe_cloud_provider == 22)
                                HR Downloads (Online Training),
                                @elseif($spe_cloud_provider == 23)
                                KnowBe4,
                                @elseif($spe_cloud_provider == 24)
                                Life Labs,
                                @elseif($spe_cloud_provider == 25)
                                Meda Compiance,
                                @elseif($spe_cloud_provider == 26)
                                Meeting Management (eScribe),
                                @elseif($spe_cloud_provider == 27)
                                Menu Stream,
                                @elseif($spe_cloud_provider == 28)
                                MESH,
                                @elseif($spe_cloud_provider == 29)
                                MOHLCT Enhanced Rate Reduction (E-RRISA),
                                @elseif($spe_cloud_provider == 30)
                                Moneris,
                                @elseif($spe_cloud_provider == 31)
                                MPAC Municipal Connect,
                                @elseif($spe_cloud_provider == 32)
                                MSDSonline,
                                @elseif($spe_cloud_provider == 33)
                                MTE (Property Taxes),
                                @elseif($spe_cloud_provider == 34)
                                OMERS,
                                @elseif($spe_cloud_provider == 35)
                                ONE online (Finance),
                                @elseif($spe_cloud_provider == 36)
                                Pharmacy (Policy Manager ),
                                @elseif($spe_cloud_provider == 37)

                                Point Click Care
                                @elseif($spe_cloud_provider == 38)

                                Spend Dynamics (BMO)
                                @elseif($spe_cloud_provider == 39)

                                SunLife
                                @elseif($spe_cloud_provider == 40)

                                SurgeLearning
                                @elseif($spe_cloud_provider == 41)

                                Sysco
                                @elseif($spe_cloud_provider == 42)

                                TextNet
                                @elseif($spe_cloud_provider == 43)

                                Weather Stations (EWSWA)
                                @elseif($spe_cloud_provider == 44)

                                WSIB
                                @elseif($spe_cloud_provider == 45)

                                Xirrus
                                    
                                @endif
                                
                            @endforeach
                        
                    @endif
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)

                                @if($service->biaServiceResult->spe_external_functions)
                                {{$service->biaServiceResult->spe_external_functions}}
                                @endif
                                
                            @endif
                        </td>
                    </tr>
                @endforeach
                   
               @endif 
                
              
            </tbody>
        </table>
        <table class="table table-bordered m0">
            <tbody>
                <tr>
                    <td class="technology">OTHER INTERNAL DEPENDENCIES (UPSTREAM/DOWNSTREAM)</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="gray">Services/Processes</td>
                    <td class="gray">Upstream Dependency</td>
                    <td class="gray">Downstream Dependency</td>
                    <td class="gray">Comments</td>
                </tr>
            </thead>
            <tbody>

                @if ($department->biaService)
                    @foreach ($department->biaService as $service)
                    <tr>
                        <td class="small">
                            {{$service->name}}
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)
    
                                @if($service->biaServiceResult->spe_internal_upstream_dependency)
                                {{$service->biaServiceResult->spe_internal_upstream_dependency}}
                                @endif
                                
                            @endif
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)
    
                                @if($service->biaServiceResult->spe_internal_downstream_dependency)
                                {{$service->biaServiceResult->spe_internal_downstream_dependency}}
                                @endif
                                
                            @endif
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)
    
                                @if($service->biaServiceResult->spe_internal_comments)
                                    {{$service->biaServiceResult->spe_internal_comments}}
                                @endif
                                
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @endif
                
                
            </tbody>
        </table>
        <div class="avoidBreak">
            <div style="padding: 20px;margin-bottom: 10px;width: 60%;border:1px solid #000;" class="people">
                <span class="title">PEOPLE AND PROCESSES</span><br><span class="content">The following
                    worksheets list notification and communication strategies, and departmental contacts (staff and
                    vendors). The Departmental Continuity Planner is responsible for keeping these notification
                    worksheets up-to-date although it can be delegated to a person working with the information within
                    the department.</span></div>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td colspan="4" class="people">ESSENTIAL PERSONNEL AND CROSS-TRAINING</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="gray text-uppercase">Service/Process</td>
                        <td class="gray text-uppercase">Performs this Service/Process</td>
                        <td class="gray text-uppercase">Can be Cross-Trained</td>
                        <td style="width: 35%;" class="gray text-uppercase">Comments</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($department->biaService)
                    @foreach ($department->biaService as $service)
                    <tr>
                        <td class="small">
                            {{$service->name}}
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)
    
                                @if($service->biaServiceResult->rac_perform)
                                {{$service->biaServiceResult->rac_perform}}
                                @endif
                                
                            @endif
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)
    
                                @if($service->biaServiceResult->rac_cross_trained)
                                {{$service->biaServiceResult->rac_cross_trained}}
                                @endif
                                
                            @endif
                        </td>
                        <td class="small">
                            @if ($service->biaServiceResult)
    
                                @if($service->biaServiceResult->rac_comments)
                                    {{$service->biaServiceResult->rac_comments}}
                                @endif
                                
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td colspan="5" class="people">MODES OF NOTIFICATION AND COMMUNICATION</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="gray">System</td>
                        <td class="gray" colspan="2">How to Use</td>
                        <td class="gray">Support Items</td>
                        <td class="gray">Access List</td>
                    </tr>
                </thead>
                <tbody>

                    @if($department->biaDepartmentResult)
                        @php
                            $rac_notification_systems = json_decode($department->biaDepartmentResult->rac_notification_system, true);
                            $rac_notification_how_to_uses = json_decode($department->biaDepartmentResult->rac_notification_how_to_use, true);
                            $rac_notification_support_items = json_decode($department->biaDepartmentResult->rac_notification_support_items, true);
                            $rac_notification_acces_lists = json_decode($department->biaDepartmentResult->rac_notification_acces_list, true);

                        @endphp

                    @endif

                    @if ($department->se_row_notification_n_communication > 0)

                        @for ($i = 0; $i < $department->se_row_notification_n_communication; $i++)
                            <tr>
                                <td class="small">@if($department->biaDepartmentResult && $rac_notification_systems){{$rac_notification_systems[$i]}}@endif</td>
                                <td class="small" colspan="2">@if($department->biaDepartmentResult && $rac_notification_how_to_uses){{$rac_notification_how_to_uses[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_notification_support_items){{$rac_notification_support_items[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_notification_acces_lists){{$rac_notification_acces_lists[$i]}}@endif</td>
                            </tr>
                        @endfor
                        
                    @endif

                  
                  
                </tbody>
            </table>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td colspan="5" class="people">INTERNAL CONTACT LIST</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="gray" style="width:20%;">Position</td>
                        <td class="gray" style="width:29%;">Name</td>
                        <td class="gray" style="width:11%;">Office Phone</td>
                        <td class="gray" style="width:11%;">Cell Phone</td>
                        <td class="gray" style="width:29%;">Email</td>
                    </tr>
                </thead>
                <tbody>

                    @if($department->biaDepartmentResult)
                        @php
                            $rac_internal_positions = json_decode($department->biaDepartmentResult->rac_internal_position, true);
                            $rac_internal_names = json_decode($department->biaDepartmentResult->rac_internal_name, true);
                            $rac_internal_office_phones = json_decode($department->biaDepartmentResult->rac_internal_office_phone, true);
                            $rac_internal_cell_phones = json_decode($department->biaDepartmentResult->rac_internal_cell_phone, true);
                            $rac_internal_emails = json_decode($department->biaDepartmentResult->rac_internal_email, true);
                        @endphp
                    @endif

                    @if ($department->se_row_department_contact_list > 0)


                        @for ($i = 0; $i < $department->se_row_department_contact_list; $i++)

                            <tr>
                                <td class="small">@if($department->biaDepartmentResult && $rac_internal_positions){{$rac_internal_positions[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_internal_names){{$rac_internal_names[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_internal_office_phones){{$rac_internal_office_phones[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_internal_cell_phones){{$rac_internal_cell_phones[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_internal_emails){{$rac_internal_emails[$i]}}@endif</td>
                            </tr>
                            
                        @endfor
                        
                        



                    @endif

                </tbody>
            </table>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td colspan="5" class="people">EXTERNAL CONTACT LIST</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="gray" style="width:20%;">VENDOR/SUPPLIER</td>
                        <td class="gray" style="width:11%;">CONTACT</td>
                        <td class="gray" style="width:11%;">Phone</td>
                        <td class="gray" style="width:29%;">Email</td>
                        <td class="gray" style="width:29%;">Comments</td>
                    </tr>
                </thead>
                <tbody>

                    @if($department->biaDepartmentResult)
                        @php
                            $rac_external_vendors = json_decode($department->biaDepartmentResult->rac_external_vendor, true);
                            $rac_external_contacts = json_decode($department->biaDepartmentResult->rac_external_contact, true);
                            $rac_external_phones = json_decode($department->biaDepartmentResult->rac_external_phone, true);
                            $rac_external_emails = json_decode($department->biaDepartmentResult->rac_external_email, true);
                            $rac_external_comments = json_decode($department->biaDepartmentResult->rac_external_comments, true);


                        @endphp
                    @endif

                    @if ($department->se_row_external_contact_list > 0)

                        @for ($i = 0; $i < $department->se_row_external_contact_list; $i++)
                            <tr>
                                <td class="small">@if($department->biaDepartmentResult && $rac_external_vendors){{$rac_external_vendors[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_external_contacts){{$rac_external_contacts[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_external_phones){{$rac_external_phones[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_external_emails){{$rac_external_emails[$i]}}@endif</td>
                                <td class="small">@if($department->biaDepartmentResult && $rac_external_comments){{$rac_external_comments[$i]}}@endif</td>
                            </tr>
                        @endfor
                        
                    @endif


                  
                </tbody>
            </table>
            <div style="page-break-before: always;"></div>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td colspan="5" class="people"> TEAM ACTION PLAN ( For all services )</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered m0">
                <thead>
                    <tr>
                        <td class="gray" colspan="2">RESPONSIBLE FOR PLAN INITIATION</td>
                        <td class="gray">PHONE</td>
                        <td class="gray">EMAIL</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="light-gray" style="width:100px">PRIME</td>
                        <td class="small">{{$department->tap_prime}}</td>
                        <td class="small" style="width:200px">
                            @if ($department->biaDepartmentResult)
                                {{$department->biaDepartmentResult->tap_prime_phone}}
                            @endif
                        </td>
                        <td class="small" style="width:200px">
                            @if ($department->biaDepartmentResult)
                                {{$department->biaDepartmentResult->tap_primve_email}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="light-gray" style="width:100px">SECONDARY</td>
                        <td class="small">{{$department->tap_prime}}</td>
                        <td class="small" style="width:200px">

                            @if ($department->biaDepartmentResult)
                                {{$department->biaDepartmentResult->tap_secondary_phone}}
                            @endif
                            

                        </td>
                        <td class="small" style="width:200px">{{$department->tap_secondary_email}}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered m0">
                <tbody>
                    <tr>
                        <td class="gray" style="width:250px;">SERVICE IMPACT/DISRUPTION</td>
                        <td class="small">

                            @if ($department->biaDepartmentResult)
                                {{$department->biaDepartmentResult->tap_service_impact}}
                            @endif
                        
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="small" colspan="2" style="width:50%;">

                            @if ($department->biaDepartmentResult)
                                {{$department->biaDepartmentResult->tap_day_1}}
                            @endif

                        </td>
                        <td class="small" colspan="2" style="width:50%;">

                            @if ($department->biaDepartmentResult)
                                {{$department->biaDepartmentResult->tap_day_2}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="position: fixed; bottom: -8px;left:0;right:0;text-align: center;font-size: 10px !important;"
                class="footer">This document is proprietary and confidential. No part of this document may be
                disclosed in any manner to a third party without the prior written consent of County of Essex</div>
        </div>
    </div>
</body>

</html>
