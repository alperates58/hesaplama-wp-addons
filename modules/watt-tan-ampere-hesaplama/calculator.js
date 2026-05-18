function hcWattTanAmpereTipiDegisti() {
    var type = document.getElementById('hc-wta2-type').value;
    var vInput = document.getElementById('hc-wta2-voltage');
    var pfGroup = document.getElementById('hc-wta2-pf-group');

    if (type === 'dc') {
        vInput.value = 12;
        pfGroup.style.display = 'none';
    } else if (type === 'ac1') {
        vInput.value = 220;
        pfGroup.style.display = 'block';
    } else {
        vInput.value = 380;
        pfGroup.style.display = 'block';
    }
}

function hcWattTanAmpereHesapla() {
    var W = parseFloat(document.getElementById('hc-wta2-power').value);
    var type = document.getElementById('hc-wta2-type').value;
    var V = parseFloat(document.getElementById('hc-wta2-voltage').value);
    var pf = parseFloat(document.getElementById('hc-wta2-pf').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir Watt değeri girin.');
        return;
    }
    if (isNaN(V) || V <= 0) {
        alert('Lütfen geçerli bir voltaj değeri girin.');
        return;
    }

    var I = 0;
    var desc = '';

    if (type === 'dc') {
        I = W / V;
        desc = W.toLocaleString('tr-TR') + ' W güce sahip DC devrede ' + V.toLocaleString('tr-TR') + ' V gerilimde akım ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper\'dir.';
    } else if (type === 'ac1') {
        if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
            alert('Lütfen geçerli bir güç faktörü girin.');
            return;
        }
        I = W / (V * pf);
        desc = W.toLocaleString('tr-TR') + ' W güce sahip tek fazlı AC devrede ' + V.toLocaleString('tr-TR') + ' V gerilim ve ' + pf.toLocaleString('tr-TR') + ' güç faktöründe akım ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper olarak hesaplanır.';
    } else {
        if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
            alert('Lütfen geçerli bir güç faktörü girin.');
            return;
        }
        I = W / (Math.sqrt(3) * V * pf);
        desc = W.toLocaleString('tr-TR') + ' W güce sahip üç fazlı AC devrede ' + V.toLocaleString('tr-TR') + ' V gerilim ve ' + pf.toLocaleString('tr-TR') + ' güç faktöründe hat akımı ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper olarak hesaplanır.';
    }

    document.getElementById('hc-wta2-res-amp').innerText = I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' A';
    document.getElementById('hc-wta2-desc').innerText = desc;

    document.getElementById('hc-watt-tan-ampere-hesaplama-result').classList.add('visible');
}
