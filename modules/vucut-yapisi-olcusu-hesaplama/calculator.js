function hcFrameSizeHesapla() {
    const gender = document.querySelector('input[name="hc-fs-gender"]:checked').value;
    const height = parseFloat(document.getElementById('hc-fs-height').value);
    const wrist = parseFloat(document.getElementById('hc-fs-wrist').value);

    if (!height || !wrist) return;

    // Formula: R = Height / Wrist Circumference
    const r = height / wrist;
    const resVal = document.getElementById('hc-fs-res-val');
    const resDesc = document.getElementById('hc-fs-res-desc');

    if (gender === 'male') {
        if (r > 10.4) { resVal.innerText = 'İnce Yapılı'; resDesc.innerText = 'Küçük kemik yapısına sahipsiniz.'; }
        else if (r >= 9.6) { resVal.innerText = 'Orta Yapılı'; resDesc.innerText = 'Normal kemik yapısına sahipsiniz.'; }
        else { resVal.innerText = 'İri Yapılı'; resDesc.innerText = 'Geniş kemik yapısına sahipsiniz.'; }
    } else {
        if (r > 11.0) { resVal.innerText = 'İnce Yapılı'; resDesc.innerText = 'Küçük kemik yapısına sahipsiniz.'; }
        else if (r >= 10.1) { resVal.innerText = 'Orta Yapılı'; resDesc.innerText = 'Normal kemik yapısına sahipsiniz.'; }
        else { resVal.innerText = 'İri Yapılı'; resDesc.innerText = 'Geniş kemik yapısına sahipsiniz.'; }
    }

    document.getElementById('hc-frame-size-result').classList.add('visible');
}
