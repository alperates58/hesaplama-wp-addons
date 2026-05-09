function hcFundusHesapla() {
    const cm = parseFloat(document.getElementById('hc-fh-cm').value);
    const week = parseFloat(document.getElementById('hc-fh-week').value);

    if (isNaN(cm) || isNaN(week)) {
        alert('Lütfen her iki değeri de girin.');
        return;
    }

    const status = document.getElementById('hc-fh-status');
    const diff = Math.abs(cm - week);

    if (week < 20) {
        status.innerText = "20. haftadan önce fundus yüksekliği ölçümü standart dışı kalabilir.";
        status.style.backgroundColor = "#e3f2fd"; status.style.color = "#1976d2";
    } else if (diff <= 2) {
        status.innerText = "Normal Gelişim: Ölçüm haftanızla uyumlu.";
        status.style.backgroundColor = "#e8f5e9"; status.style.color = "#2e7d32";
    } else if (cm > week) {
        status.innerText = "Ölçüm Beklenenden Yüksek: Çoğul gebelik veya fazla amniyotik sıvı belirtisi olabilir.";
        status.style.backgroundColor = "#fffde7"; status.style.color = "#fbc02d";
    } else {
        status.innerText = "Ölçüm Beklenenden Düşük: Gelişim geriliği veya az amniyotik sıvı belirtisi olabilir.";
        status.style.backgroundColor = "#ffebee"; status.style.color = "#c62828";
    }

    document.getElementById('hc-fundus-result').classList.add('visible');
}
