function hc24VKabloKesitiHesapla() {
    const akim = parseFloat(document.getElementById('hc-24v-akim').value);
    const mesafe = parseFloat(document.getElementById('hc-24v-mesafe').value);
    const kayipYuzde = parseFloat(document.getElementById('hc-24v-kayip').value);

    if (!akim || !mesafe) {
        alert('Lütfen akım ve mesafe bilgilerini giriniz.');
        return;
    }

    const voltaj = 24;
    const ozdirenc = 0.0175; // Bakır
    const izinVerilenKayip = (voltaj * kayipYuzde) / 100;

    // S = (2 * L * I * rho) / V_drop
    const kesit = (2 * mesafe * akim * ozdirenc) / izinVerilenKayip;

    const standartKesitler = [0.5, 0.75, 1, 1.5, 2.5, 4, 6, 10, 16, 25, 35, 50, 70, 95];
    let onerilenKesit = standartKesitler.find(s => s >= kesit);
    
    if (!onerilenKesit) {
        onerilenKesit = Math.ceil(kesit);
    }

    const sonucDiv = document.getElementById('hc-24v-result');
    document.getElementById('hc-24v-res-section').innerText = onerilenKesit.toLocaleString('tr-TR') + ' mm²';
    document.getElementById('hc-24v-res-drop').innerText = izinVerilenKayip.toLocaleString('tr-TR') + ' V (' + kayipYuzde + '%)';
    
    const noteDiv = document.getElementById('hc-24v-res-note');
    noteDiv.innerText = `Teorik ihtiyaç: ${kesit.toFixed(2).toLocaleString('tr-TR')} mm². 24V sistemlerde %3 kayıp ideal kabul edilir.`;

    sonucDiv.classList.add('visible');
}
