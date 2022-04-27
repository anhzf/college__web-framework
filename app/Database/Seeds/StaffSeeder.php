<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run()
    {
        /* 
        source:
        - https://ptik.fkip.uns.ac.id/profil/struktur-organisasi-prodi/
        - https://ptik.fkip.uns.ac.id/cdos/home
        - https://ptik.fkip.uns.ac.id/full-staff-handbook/
        */
        $this->db->table('staff')->insertBatch([
            [
                'nip' => '1978032520161001',
                'name' => 'Cucuk Wawan Budiyanto, S.T., Ph.D',
                'email' => 'cbudiyanto@staff.uns.ac.id',
                'phone' => '6282220040278',
                'position' => 'Head of Study Program',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/1a-250x250.png',
                'research_interest' => 'Educational Robotics; Technology-use in Education; Digital Transformation',
            ],
            [
                'nip' => '198008082005011003',
                'name' => 'Dwi Maryono, S.Si., M.Kom',
                'email' => 'dwimaryono@staff.uns.ac.id',
                'phone' => '6285601455976',
                'position' => 'Assistant Professor',
                'research_interest' => 'Data Mining, Educational Technology, and Interactive Multimedia',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/8a-250x250.png',
            ],
            [
                'nip' => '196708191993031002',
                'name' => 'Dr.Agus Efendi, M.Pd',
                'email' => 'agusuns@yahoo.com',
                'phone' => '6285601455976',
                'position' => 'Associate Professor',
                'research_interest' => 'Education',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/11a-250x250.png',
            ],
            [
                'nip' => '197904202005011002',
                'name' => 'Basori, M.Pd',
                'email' => 'basori@staff.uns.ac.id',
                'phone' => '6281329095029',
                'position' => 'Assistant Professor',
                'research_interest' => 'E-learning, Online Learning, and Learning Media',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/12a-250x250.png',
            ],
            [
                'nip' => '198012172005011001',
                'name' => 'Aris Budianto, ST. M.Eng',
                'email' => 'arisbudianto@staff.uns.ac.id',
                'phone' => '6285777700838',
                'position' => 'Senior Lecturer',
                'research_interest' => 'Educational Technology',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/3a-250x250.png',
            ],
            [
                'nip' => '198002142015041002',
                'name' => 'Endar Suprih Wihidayat, S.T., M.Eng',
                'email' => 'endars@staff.uns.ac.id',
                'phone' => '628112511980',
                'position' => 'Senior Lecturer',
                'research_interest' => 'Mobile Apps for Education, Game-based Learning, and Computer & Education',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/9a-250x250.png',
            ],
            [
                'nip' => '198712312019031024',
                'name' => 'Puspanda Hatta, S. Kom., M. Eng.',
                'email' => 'hatta.puspanda@staff.uns.ac.id',
                'phone' => '6287835546373',
                'position' => 'Senior Lecturer',
                'research_interest' => 'Computer Network, Cybersecurity',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/7a-250x250.png',
            ],
            [
                'nip' => '197909012002121001',
                'name' => 'Rosihan Ari Yuana, S. Si, M. Kom',
                'email' => 'rosihanari@staff.uns.ac.id',
                'phone' => '6285716191979',
                'position' => 'Associate Professor',
                'research_interest' => 'Computer Aided Learning',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/10a-250x250.png',
            ],
            [
                'nip' => '198106152008121003',
                'name' => 'Yudianto Sujana, S. Kom., M. Kom',
                'email' => 'yudianto.sujana@gmail.com',
                'phone' => '886979059418',
                'position' => 'Senior Lecturer',
                'research_interest' => '-',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/04/13a-250x250.png',
            ],
            [
                'nip' => '199105242019031016',
                'name' => 'Yusfia Hafid Aristyagama, S.T., M.T.',
                'email' => 'yusfia.hafid@staff.uns.ac.id',
                'phone' => '6282120445712',
                'position' => 'Lecturer',
                'research_interest' => 'Computer Graphics, Computer Vision',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/2a-250x250.png',
            ],
            [
                'nip' => '199109242019031015',
                'name' => 'Nurcahya Pradana Taufik Prakisya, S. Kom., M.Cs.',
                'email' => 'nurcahya.ptp@staff.uns.ac.id',
                'phone' => '6285647430077',
                'position' => 'Senior Lecturer',
                'research_interest' => 'Computer Vision, Artificial Intelligence',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/4a-250x250.png',
            ],
            [
                'nip' => '198802072019031009',
                'name' => 'Febri Liantoni, S.ST., M.Kom',
                'email' => 'febri.liantoni@staff.uns.ac.id',
                'phone' => '628563580817',
                'position' => 'Senior Lecturer',
                'research_interest' => 'Data Mining, Artificial Intelligence',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/6a-250x250.png',
            ],
            [
                'nip' => '1980051020061201',
                'name' => 'Guruh Dian Asmara, A.Md.',
                'email' => '-',
                'phone' => '-',
                'position' => 'General functional',
                'research_interest' => '-',
                'picture_url' => 'https://i0.wp.com/ptik.fkip.uns.ac.id/wp-content/uploads/2022/03/5a-250x250.png',
            ],
        ]);
    }
}
