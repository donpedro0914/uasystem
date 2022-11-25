@extends('layouts.appfront')
@section('content')
    @include('global.front_topnav')
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                    {{ HTML::image('img/banner.png', 'UA', array('width'=>'100%')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <div class="hiring-list mt-4">
                                <h1 class="text-center">Our Openings</h1>
                                <p class="text-center">We have {{ $jobCount }} Open Positions</p>
                                <ul class="hiring">
                                    @foreach($jobs as $job)
                                    <li class="job">
                                        <div class="job-body">
                                            <a href="{{ route('jobs.info', ['id'=>$job->id]) }}">
                                                <h5>{{ $job->job_title }}</h5>
                                            </a>
                                            <span><b>{{ $job->company }}</b></span><br>
                                            <span>{{ $job->job_type }}</span>
                                        </div>
                                        <a href="{{ route('jobs.info', ['id'=>$job->id]) }}">
                                            <button class="btn btn-primary">Apply</button>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <h4 class="text-center"><a href="{{ route('job-hiring') }}">Show more</a></h4>
                            </div>
                            <div class="tab-container">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#vision" data-toggle="tab" class="nav-link active">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#mission" data-toggle="tab" class="nav-link">Mission</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#scientia" data-toggle="tab" class="nav-link">Academic Excellence (SCIENTIA)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#virtus" data-toggle="tab" class="nav-link">Christian Formation (VIRTUS)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#communitas" data-toggle="tab" class="nav-link">Community Service (COMMUNITAS)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="vision">
                                        <p>The University of the Assumption an Archdiocesan Catholic Educational Institution envisions itself as the leading formator of academically competent, morally upright, and socially responsible Catholic leaders.</p>
                                    </div>
                                    <div class="tab-pane" id="mission">
                                        <p>The University of the Assumption commits itself to the integral development of Catholic leaders through academic excellence, Christian formation, and community service.</p>
                                    </div>
                                    <div class="tab-pane" id="scientia">
                                        <p>The University of the Assumption seeks to lead students gain world-class competence in the area they can best utilize their human talents and resources through well-planned academic programs, effective and efficient instruction, quality support services and functional research.</p>
                                    </div>
                                    <div class="tab-pane" id="virtus">
                                        <p>The University of the Assumption seeks to form a community of disciples and to develop a community of apostles where all the members are enlightened and purified by the Gospel values filled with zeal for the transformation of their immediate communities, Pampanga, and the Philippines.</p>
                                    </div>
                                    <div class="tab-pane" id="communitas">
                                        <p>The University of the Assumption seeks to assume leadership in community development through active involvement in current religious, economic, political, socio-cultural, and ecological concerns of the nation and of the world.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="goals-container">
                                <h3>University Goals</h3>
                                <p>The University of the Assumption seeks to:</p>
                                <ol>
                                    <li>develop living witnesses of Gospel values through religious instruction, liturgical celebrations, prayer services, and community activities within the immediate community in Pampanga and in the country.</li>
                                    <li>provide an educational milieu among all members where they pursue excellence in the arts and sciences leading to intellectual inquiry, reflective judgment and resolute action;</li>
                                    <li>promote a strong sense of responsibility among the members to enable them to respond, to initiate and participate in the social transformation of families, communities and nations. Thus, the University of the Assumption continuously provides society with competent and ethical professionals for meaningful leadership roles in cultural, economic, and technological growth.</li>
                                </ol>
                            </div>
                            <div class="quality-container">
                                <h3 class="text-center">Quality Policy</h3>
                                <p>The University of the Assumption, an Archdiocesan Catholic educational institution, commits itself to the development of Catholic leaders through academic excellence, Christian formation and community service. Thus, we commit to…</p>
                                <ul>
                                    <li>sustain a strong and visible commitment to Catholic tradition;</li>
                                    <li>deliver responsive and quality instruction;</li>
                                    <li>enhance and promote research-based practices for the upgrading of instruction and extension;</li>
                                    <li>create an impact in the immediate and larger community;</li>
                                    <li>effectively deliver student services towards a dynamic learning environment and manage resources for sustainable institutional growth;</li>
                                    <li>create and maintain a working environment in which people become fully involved in achieving our objectives;</li>
                                    <li>manage activities and related resources as a process or series of interconnected processes so that desired results are achieved more efficiently;</li>
                                    <li>pursue continual improvement across all aspects of our quality management system;</li>
                                    <li>make decisions relating to our quality management system following an analysis of relevant data and information;</li>
                                    <li>establish interdependent and mutually beneficial relationships with local and international institutions and other interested parties;</li>
                                    <li>continuously care for Mother Earth, our common home for the sustenance of life.</li>
                                </ul>
                                <p class="text-center">REV. FR. JOSELITO C. HENSON, S.TH.D.<br>University President</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection