function hcWallpaperHesapla() {
    const w = parseFloat(document.getElementById('hc-wp-width').value);
    const h = parseFloat(document.getElementById('hc-wp-height').value);
    const rollW = parseFloat(document.getElementById('hc-wp-roll-w').value);
    const rollL = parseFloat(document.getElementById('hc-wp-roll-l').value);

    if (!w || !h || !rollW || !rollL) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    const wallArea = w * h;
    const rollArea = rollW * rollL;
    
    // Standard calculation with 10% waste factor
    let rollsNeeded = (wallArea / rollArea) * 1.1;
    rollsNeeded = Math.ceil(rollsNeeded);

    const resVal = document.getElementById('hc-wp-res-val');
    resVal.innerText = rollsNeeded;

    document.getElementById('hc-wallpaper-result').classList.add('visible');
}
