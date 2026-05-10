let btLogs = [];

function hcBTKaydet() {
    const sys = parseFloat(document.getElementById('hc-bt-sys').value);
    const dia = parseFloat(document.getElementById('hc-bt-dia').value);
    const pulse = parseFloat(document.getElementById('hc-bt-pulse').value);

    if (!sys || !dia || !pulse) return;

    const now = new Date().toLocaleDateString('tr-TR');
    btLogs.push({ date: now, sys, dia, pulse });

    document.getElementById('hc-bt-log').style.display = 'block';
    const row = `<tr><td>${now}</td><td>${sys}/${dia}</td><td>${pulse}</td></tr>`;
    document.getElementById('hc-bt-body').innerHTML += row;

    hcBTUpdateStats();
}

function hcBTUpdateStats() {
    const avgSys = btLogs.reduce((a, b) => a + b.sys, 0) / btLogs.length;
    const avgDia = btLogs.reduce((a, b) => a + b.dia, 0) / btLogs.length;
    const avgPulse = btLogs.reduce((a, b) => a + b.pulse, 0) / btLogs.length;

    document.getElementById('hc-bt-stats').innerHTML = `
        Kayıt Sayısı: <strong>${btLogs.length}</strong><br>
        Ortalama Tansiyon: <strong>${Math.round(avgSys)}/${Math.round(avgDia)} mmHg</strong><br>
        Ortalama Nabız: <strong>${Math.round(avgPulse)} bpm</strong>
    `;
    document.getElementById('hc-bt-result').classList.add('visible');
}
