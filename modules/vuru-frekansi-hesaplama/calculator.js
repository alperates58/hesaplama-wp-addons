function hcVuruFrekansiHesapla() {
    var f1 = parseFloat(document.getElementById('hc-vuf-f1').value);
    var f2 = parseFloat(document.getElementById('hc-vuf-f2').value);

    if (isNaN(f1) || f1 < 0 || isNaN(f2) || f2 < 0) {
        alert('Lütfen geçerli pozitif frekans değerleri girin.');
        return;
    }

    // Beat frequency = |f1 - f2|
    var fBeat = Math.abs(f1 - f2);

    // Average frequency = (f1 + f2) / 2
    var fAvg = (f1 + f2) / 2;

    document.getElementById('hc-vuf-res-beat').innerText = fBeat.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Hz';
    document.getElementById('hc-vuf-res-avg').innerText = fAvg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Hz';

    var desc = f1.toLocaleString('tr-TR') + ' Hz ve ' + f2.toLocaleString('tr-TR') + ' Hz frekanslarına sahip iki dalga birbiriyle karıştığında, saniyede tam ' + fBeat.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kez yükselip alçalan periyodik bir vuru (dalgalanma) sesi oluşur. Kulağınızın algılayacağı temel ses tonu ise bu iki frekansın ortalaması olan ' + fAvg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Hz düzeyinde olacaktır. Müzik aletlerinin akort edilmesinde bu dalgalanmanın sıfırlanması hedeflenir.';
    document.getElementById('hc-vuf-desc').innerText = desc;

    document.getElementById('hc-vuru-frekansi-hesaplama-result').classList.add('visible');
}
