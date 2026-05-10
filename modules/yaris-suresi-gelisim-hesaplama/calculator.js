function hcRaceImpHesapla() {
    const oldMin = parseInt(document.getElementById('hc-ri-old-min').value || 0);
    const oldSec = parseInt(document.getElementById('hc-ri-old-sec').value || 0);
    const newMin = parseInt(document.getElementById('hc-ri-new-min').value || 0);
    const newSec = parseInt(document.getElementById('hc-ri-new-sec').value || 0);

    if ((!oldMin && !oldSec) || (!newMin && !newSec)) {
        alert('Lütfen süreleri giriniz.');
        return;
    }

    const tOld = (oldMin * 60) + oldSec;
    const tNew = (newMin * 60) + newSec;

    const diff = tOld - tNew;
    const percent = (diff / tOld) * 100;

    const resVal = document.getElementById('hc-ri-res-val');
    resVal.innerText = percent.toFixed(2).toLocaleString('tr-TR');

    const resDiff = document.getElementById('hc-ri-res-diff');
    const dMin = Math.floor(Math.abs(diff) / 60);
    const dSec = Math.abs(diff) % 60;
    
    if (diff > 0) {
        resDiff.innerText = `Sürenizi ${dMin} dk ${dSec} sn iyileştirdiniz!`;
        resDiff.style.color = "#27ae60";
    } else {
        resDiff.innerText = `Süreniz ${dMin} dk ${dSec} sn geriledi.`;
        resDiff.style.color = "#e74c3c";
    }

    document.getElementById('hc-race-imp-result').classList.add('visible');
}
