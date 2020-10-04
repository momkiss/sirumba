<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@index');

Route::get('/detail/post/{slug}', [
	'uses' => 'FrontendController@singlePost',
	'as' => 'post.single'
]);

Route::get('/category/{id}', [
	'uses' => 'FrontendController@category',
	'as'   => 'category.single'
]);

Route::get('/detail/tag/{id}', [
	'uses' => 'FrontendController@tag',
	'as'   => 'tag.single'
]);


Route::get('kontak','FrontendController@kontak')->name('kontak');



// Route group
Route::group(['prefix' => 'admin', 'middleware' => 'roles', 'roles' => ['admin']], function(){

Route::namespace('Admin')->group(function() {
    Route::resource('users', 'UsersController', ['except' => ['show']]);
    Route::post('post-daftar', 'UsersController@postDaftar'); 

});

Route::get('permohonan/rekap', 'PemohonController@rekap')->name('permohonan.rekap'); 
Route::get('permohonan/edit/{id}', 'PemohonController@edit')->name('permohonan.edit'); 
Route::get('permohonan/selesai/{id}', 'PemohonController@status');
Route::get('permohonan/status/{id}/{status}', 'PemohonController@statusVerifikasi');
Route::post('permohonan/simpan', 'PemohonController@store')->name('permohonan.simpan');
Route::get('permohonan/result', function(\App\Pemohon $permohonan){
	$pemohon = $permohonan->get();
	return view("admin.permohonan.result", compact('pemohon'));
})->name('permohonan.result');

Route::get('permohonan/rekap/ajax','PemohonController@ajax');

Route::get('permohonan/pengembang/{id}','PemohonController@getPengembang');

// Update
Route::post('permohonan/update/{id}', 'PemohonController@update')->name('permohonan.update');
Route::post('jumlah/update/{id}', 'JumlahRumahController@update')->name('jumlah.update');
Route::post('utilitas/update/{id}', 'UtilitasController@update')->name('utilitas.update');
Route::post('sarana/update/{id}', 'PemohonController@updateSarana')->name('sarana.update');
Route::post('prasarana/jalan-masuk/update/{id}', 'JalanMasukController@update')->name('jalan-masuk.update');
Route::post('prasarana/jalan-utama/update/{id}', 'JalanUtamaController@update')->name('jalan-utama.update');
Route::post('prasarana/jalan-pembantu/update/{id}', 'JalanPembantuController@update')->name('jalan-pembantu.update');
Route::post('prasarana/jalan-pembagi/update/{id}', 'JalanPembagiController@update')->name('jalan-pembagi.update');
Route::post('prasarana/culdesac/update/{id}', 'CuldesacController@update')->name('culdesac.update');
Route::post('prasarana/drainase/update/{id}', 'DrainaseController@update')->name('drainase.update');
Route::post('prasarana/limbah/update/{id}', 'LimbahController@update')->name('limbah.update');
Route::post('prasarana/sampah/update/{id}', 'SampahController@update')->name('sampah.update');

// Hapus
Route::get('prasarana/jalan-masuk/hapus/{id}','JalanMasukController@destroy')->name('jalan-masuk.hapus');
Route::get('prasarana/jalan-utama/hapus/{id}','JalanUtamaController@destroy')->name('jalan-utama.hapus');
Route::get('prasarana/jalan-pembantu/hapus/{id}','JalanPembantuController@destroy')->name('jalan-pembantu.hapus');
Route::get('prasarana/jalan-pembagi/hapus/{id}','JalanPembagiController@destroy')->name('jalan-pembagi.hapus');
Route::get('prasarana/culdesac/hapus/{id}','CuldesacController@destroy')->name('culdesac.hapus');
Route::get('prasarana/drainase/hapus/{id}','DrainaseController@destroy')->name('drainase.hapus');
Route::get('prasarana/limbah/hapus/{id}','LimbahController@destroy')->name('limbah.hapus');
Route::get('prasarana/sampah/hapus/{id}','SampahController@destroy')->name('sampah.hapus');

// Detail
Route::post('permohonan/detail/{id}', 'PemohonController@detail_pemohon')->name('permohonan.detail');
Route::post('prasarana/detail/{id}', 'PemohonController@detail_prasarana')->name('prasarana.detail');
Route::post('sarana/detail/{id}', 'PemohonController@detail_sarana')->name('sarana.detail');
Route::post('utilitas/detail/{id}', 'PemohonController@detail_utilitas')->name('utilitas.detail');
Route::post('ukuran/detail/{id}', 'PemohonController@detail_ukuran')->name('ukuran.detail');
Route::post('berkas/detail/{id}', 'BerkasController@detail')->name('berkas.detail');

Route::post('prasarana/jalan-masuk/simpan','JalanMasukController@store')->name('jalan-masuk.simpan');
Route::post('prasarana/jalan-utama/simpan','JalanUtamaController@store')->name('jalan-utama.simpan');
Route::post('prasarana/jalan-pembantu/simpan','JalanPembantuController@store')->name('jalan-pembantu.simpan');
Route::post('prasarana/jalan-pembagi/simpan','JalanPembagiController@store')->name('jalan-pembagi.simpan');;
Route::post('prasarana/culdesac/simpan','CuldesacController@store')->name('culdesac.simpan');
Route::post('prasarana/drainase/simpan','DrainaseController@store')->name('drainase.simpan');
Route::post('prasarana/limbah/simpan','LimbahController@store')->name('limbah.simpan');
Route::post('prasarana/sampah/simpan','SampahController@store')->name('sampah.simpan');

Route::post('sarana/simpan','PemohonController@simpanSarana')->name('sarana.simpan');

Route::get('berkas/show/{id}','BerkasController@show')->name('berkas.show');
Route::get('sarana/show/{id}','PeribadatanController@show')->name('sarana.show');
Route::post('berkas/upload','BerkasController@upload')->name('berkas.upload');
Route::get('berkas/hapus/{id}/{pemohon}','BerkasController@hapus')->name('berkas.hapus');

Route::get('getkelurahan/{kode}', 'MasterKecamatanController@getKelurahan');
Route::get('data-konstruksi', 'MasterJenisKonstruksiController@getDataKonstruksi');



// Route::middleware('can:isAdmin')->group(function() {
    Route::get('beranda', 'BerandaController@index')->name('beranda');
    Route::resource('permohonan', 'PemohonController', ['except' => ['show','store','permohonan.result']]);
    Route::resource('jenisberkas', 'JenisBerkasController', ['except' => ['show']]);
    Route::resource('berkas', 'BerkasController', ['except' => ['show','upload']]);
    Route::resource('jenis-konstruksi', 'MasterJenisKonstruksiController', ['except' => ['show']]);
    Route::resource('jenis-bangunan', 'MasterJenisBangunanController', ['except' => ['show']]);
    Route::resource('kecamatan', 'MasterKecamatanController', ['except' => ['show']]);
    Route::resource('kelurahan', 'MasterKelurahanController', ['except' => ['show']]);
    Route::resource('tipe-rumah', 'MasterTipeController', ['except' => ['show']]);
    Route::resource('jenis-perumahan', 'MasterJenisPerumahanController', ['except' => ['show']]);
    Route::resource('ukuran', 'JumlahRumahController', ['except' => ['show','jumlah.update']]);
    Route::resource('opd', 'OpdController', ['except' => ['show']]);
    Route::resource('utilitas', 'UtilitasController', ['except' => ['show','utilitas.update']]);
	Route::resource('laporan', 'LaporanController', ['except' => ['show','pencarian']]);
	Route::resource('pengembang', 'PengembangController', ['except' => ['show']]);
	
	Route::get('laporan/permohonan/{id}','LaporanController@permohonan')->name('laporan.permohonan');
	Route::get('laporan/kelengkapan/{id}','LaporanController@kelengkapan')->name('laporan.kelengkapan');
	
	Route::get('laporan/perkecamatan','LaporanController@perkecamatan')->name('laporan.perkecamatan');
	Route::get('laporan/perkecamatan/tampil','LaporanController@perkecamatanTampil')->name('laporan.perkecamatan.tampil');
	
	Route::get('laporan/perpengembang','LaporanController@perpengembang')->name('laporan.perpengembang');
	Route::get('laporan/perpengembang/tampil','LaporanController@perpengembangTampil')->name('laporan.perpengembang.tampil');


	Route::get('laporan/pencarian', [
				'uses'	=> 'LaporanController@pencarian',
				'as'	=> 'laporan.pencarian'
				]);
	
// Berita
    Route::get('/post/create',[
			'uses' => 'PostController@create',
			'as' => 'post.create'
	]);

	Route::post('/post/store',[
			'uses' => 'PostController@store',
			'as' => 'post.store'
	]);

	Route::get('/post/delete/{id}',[
			'uses' => 'PostController@destroy',
			'as' => 'post.delete'
	]);

	Route::post('/post/edit/{id}',[
			'uses' => 'PostController@edit',
			'as' => 'post.edit'
	]);

	Route::get('/post', [
		'uses' => 'PostController@index',
		'as' => 'posts'
    ]);
    
	Route::get('/post/trashed', [
		'uses' => 'PostController@trashed',
		'as' => 'posts.trashed'
	]);

	Route::get('/post/kill/{id}', [
		'uses' => 'PostController@kill',
		'as' => 'post.kill'
	]);

	Route::get('/post/restore/{id}', [
		'uses' => 'PostController@restore',
		'as' => 'post.restore'

	]);

	Route::get('/post/edit/{id}', [
		'uses' => 'PostController@edit',
		'as' => 'post.edit'
	]);

	Route::post('/post/update/{id}', [
		'uses' => 'PostController@update',
		'as' => 'post.update'
	]);


	Route::get('/categories',[
		'uses' => 'CategoryController@index',
		'as' => 'categories'
    ]);	
    
	Route::get('/category/create',[
		'uses' => 'CategoryController@create',
		'as' => 'category.create'
	]);

	Route::post('/category/store', [
		'uses' => 'CategoryController@store',
		'as' => 'category.store'
	]);

	Route::get('/category/edit/{id}',[
		'uses' => 'CategoryController@edit',
		'as' => 'category.edit'
	]);	

	Route::get('/category/delete/{id}',[
		'uses' => 'CategoryController@destroy',
		'as' => 'category.delete'
	]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoryController@update',
		'as' => 'category.update'
	]);

	Route::get('/tag', [
		'uses' => 'TagController@index',
		'as' => 'tags'

	]);

	Route::get('/tag/edit/{id}', [
		'uses' => 'TagController@edit',
		'as' => 'tag.edit'

	]);

	Route::get('/tag/create', [
		'uses' => 'TagController@create',
		'as' => 'tag.create'

	]);

	Route::post('/tag/store', [
		'uses' => 'TagController@store',
		'as' => 'tag.store'

	]);

	Route::post('/tag/update/{id}', [
		'uses' => 'TagController@update',
		'as' => 'tag.update'

	]);

	Route::get('/tag/delete/{id}', [
		'uses' => 'TagController@destroy',
		'as' => 'tag.delete'

	]);

	});

	Route::resource('galeri', 'GaleriController');

	Route::resource('slider', 'SliderController');
	Route::resource('page', 'PageController');
	Route::resource('identitas', 'IdentitasController');

// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
