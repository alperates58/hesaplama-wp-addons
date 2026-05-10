function hcSealantCalcHesapla() {
    const L = parseFloat(document.getElementById('hc-sc-length').value);
    const W = parseFloat(document.getElementById('hc-sc-width').value);
    const D = parseFloat(document.getElementById('hc-sc-depth').value);
    const tubeML = parseFloat(document.getElementById('hc-sc-tube').value);

    if (!L || !W || !D || !tubeML) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Volume in ml = Length(m) * Width(mm) * Depth(mm)
    const totalVolumeML = L * W * D;
    const tubes = Math.ceil(totalVolumeML / tubeML);

    const resVal = document.getElementById('hc-sc-res-val');
    resVal.innerText = tubes;

    document.getElementById('hc-sealant-result').classList.add('visible');
}
