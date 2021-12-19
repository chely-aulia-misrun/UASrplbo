<div id="sidebar-menu" class="slimscroll-menu">
    <ul class="metismenu" id="menu-bar">
        <li>
            <a href="/">
                <span> Beranda </span>
            </a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
            <li>
                <a href="/tahunajaran">
                    <span> Tahun Ajaran </span>
                </a>
            </li><li>
                <a href="/kelas">
                    <span> Data Kelas </span>
                </a>
            </li><li>
                <a href="/sekolah">
                    <span> Data Sekolah </span>
                </a>
            </li><li>
                <a href="/kurikulum">
                    <span> Data Kurikulum </span>
                </a>
            </li><li>
                <a href="/matapelajaran">
                    <span> Data Mata Pelajaran </span>
                </a>
            </li><li>
                <a href="/guru">
                    <span> Data Guru </span>
                </a>
            </li><li>
                <a href="/datasiswa">
                    <span> Data Siswa </span>
                </a>
            </li><li>
                <a href="/eskul">
                    <span> Data Eskul </span>
                </a>
            </li>
        @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Non-admin')
            <li>
                <a href="/nonadmin/kelas">
                    <span> Data Kelas </span>
                </a>
            </li><li>
                <a href="/nonadmin/matapelajaran">
                    <span> Data Mata Pelajaran </span>
                </a>
            </li>
        @else
            <li>
                <a href="/siswa/kelas">
                    <span> Data Kelas </span>
                </a>
            </li><li>
                <a href="/siswa/matapelajaran">
                    <span> Data Mata Pelajaran </span>
                </a>
            </li><li>
                <a href="/siswa/rapor">
                    <span> Data Rapor </span>
                </a>
            </li>
        @endif
    </ul>
</div>
