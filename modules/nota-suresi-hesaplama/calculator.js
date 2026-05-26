function hcNotaSureleriHesapla() {
    var bpm = parseFloat(document.getElementById('hc-nsh-bpm').value) || 120;

    if (bpm <= 0) {
        alert('Lütfen geçerli bir BPM değeri giriniz.');
        return;
    }

    // 1 dörtlük nota süresi = 60000 / BPM
    var d4 = 60000 / bpm;

    var notaTipleri = [
        { isim: '1/1 Birlik Nota (Whole)', katsayi: 4 },
        { isim: '1/2 İkilik Nota (Half)', katsayi: 2 },
        { isim: '1/4 Dörtlük Nota (Quarter)', katsayi: 1 },
        { isim: '1/8 Sekizlik Nota (Eighth)', katsayi: 0.5 },
        { isim: '1/16 Onaltılık Nota (Sixteenth)', katsayi: 0.25 },
        { isim: '1/32 Otuzikilik Nota (32nd)', katsayi: 0.125 }
    ];

    var tbody = document.getElementById('hc-nsh-table-body');
    tbody.innerHTML = '';

    for (var i = 0; i < notaTipleri.length; i++) {
        var base = d4 * notaTipleri[i].katsayi;
        var dotted = base * 1.5;
        var triplet = base * (2/3);

        var tr = document.createElement('tr');
        tr.innerHTML = '<td>' + notaTipleri[i].isim + '</td>' +
                       '<td style="text-align:right; font-weight:bold;">' + Math.round(base) + ' ms</td>' +
                       '<td style="text-align:right;">' + Math.round(dotted) + ' ms</td>' +
                       '<td style="text-align:right;">' + Math.round(triplet) + ' ms</td>';
        tbody.appendChild(tr);
    }

    document.getElementById('hc-nsh-result').classList.add('visible');
    document.getElementById('hc-nsh-result').classList.add('visible');
}