<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Borrow Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        h2 { text-align: center; color: #1e293b; margin-bottom: 4px; }
        .subtitle { text-align: center; color: #64748b; margin-bottom: 20px; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #1e293b; color: white; padding: 8px 10px; text-align: left; font-size: 11px; }
        td { padding: 7px 10px; border-bottom: 1px solid #e2e8f0; }
        tr:nth-child(even) td { background: #f8fafc; }
        .status-borrowed { color: #d97706; font-weight: bold; }
        .status-returned { color: #16a34a; font-weight: bold; }
        .status-overdue  { color: #dc2626; font-weight: bold; }
        .footer { margin-top: 30px; text-align: right; font-size: 10px; color: #94a3b8; }
    </style>
</head>
<body>
<h2>🔍 Campus Lost & Found System</h2>
    <div class="subtitle">Borrow Records Report — Generated {{ now()->format('F d, Y') }}</div>

    <table>
        <thead>
            <tr>
                <th>#</th>
<th>Item Name</th>
                <th>Reporter</th>
                <th>Reported</th>
                <th>Claimed</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
<td>{{ $r->lostItem->item_name }}</td>
                <td>{{ $r->reporter->name }}</td>
                <td>{{ $r->reported_date->format('M d, Y') }}</td>
                <td>{{ $r->claimed_date ? $r->claimed_date->format('M d, Y') : '—' }}</td>
                <td class="status-{{ $r->status }}">{{ ucfirst($r->status) }}</td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center">No records found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">Total Records: {{ $records->count() }} | Library Lending System</div>
</body>
</html>