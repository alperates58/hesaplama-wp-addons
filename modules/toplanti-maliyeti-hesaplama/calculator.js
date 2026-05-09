function hcMeetingCostHesapla() {
    const attendees = parseInt(document.getElementById('hc-meet-attendees').value) || 1;
    const salary = parseFloat(document.getElementById('hc-meet-salary').value) || 0;
    const duration = parseFloat(document.getElementById('hc-meet-duration').value) || 0;

    // 2026 İş gücü maliyet katsayısı (Sigorta, yan haklar vb. ~1.5x)
    const totalCostFactor = 1.5;
    const monthlyWorkHours = 180;
    
    const hourlyRate = (salary * totalCostFactor) / monthlyWorkHours;
    const totalCost = attendees * hourlyRate * (duration / 60);

    document.getElementById('hc-res-meet-total').innerText = totalCost.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-meeting-cost-result').classList.add('visible');
}
