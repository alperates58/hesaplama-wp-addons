function hcSplitCalcHesapla() {
    const totalDist = parseFloat(document.getElementById('hc-sc-dist').value);
    const splitDist = parseFloat(document.getElementById('hc-sc-split').value);
    const min = parseInt(document.getElementById('hc-sc-min').value || 0);
    const sec = parseInt(document.getElementById('hc-sc-sec').value || 0);

    if (!totalDist || !splitDist || (!min && !sec)) {
        alert('Lütfen tüm bilgileri giriniz.');
        return;
    }

    const totalSeconds = (min * 60) + sec;
    const numberOfSplits = totalDist / splitDist;
    const splitSeconds = totalSeconds / numberOfSplits;

    const sMin = Math.floor(splitSeconds / 60);
    const sSec = (splitSeconds % 60).toFixed(1);

    const resVal = document.getElementById('hc-sc-res-val');
    resVal.innerText = `${sMin}:${sSec < 10 ? '0' + sSec : sSec}`;

    document.getElementById('hc-split-calc-result').classList.add('visible');
}
