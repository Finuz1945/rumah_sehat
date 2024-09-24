function getParameterByName(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

function showPopup(message) {
    alert(message);
}

window.onload = function() {
    const status = getParameterByName('status');
    const role = getParameterByName('role');

    console.log('Status:', status, 'Role:', role);

    if (status === 'success' && role === 'pasien') {
        showPopup('Login berhasil sebagai Pasien.');
    } else if (status === 'success' && role === 'dokter') {
        showPopup('Login berhasil sebagai Dokter.');
    } else if (status === 'failed') {
        showPopup('Login Gagal, silakan coba lagi.');
    }
};