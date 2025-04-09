<?php

namespace NhanChauKP\MomoPayment\Constants;

class ErrorCodes
{
    public const SUCCESS = 0;

    // System errors
    public const SYSTEM_MAINTENANCE = 10;

    public const ACCESS_DENIED = 11;

    public const UNSUPPORTED_API_VERSION = 12;

    public const AUTHENTICATION_FAILED = 13;

    public const INVALID_LIST_DATA = 47;

    public const QR_CREATE_FAILED = 98;

    public const UNKNOWN_ERROR = 99;

    public const PAYMENT_URL_EXPIRED = 1005;

    public const ACCOUNT_INACTIVE = 1007;

    public const PROMOTION_RESTRICTED = 1026;

    // Merchant errors
    public const INVALID_REQUEST_FORMAT = 20;

    public const INVALID_AMOUNT = 21;

    public const INVALID_TRANSACTION_AMOUNT = 22;

    public const DUPLICATE_REQUEST_ID = 40;

    public const DUPLICATE_ORDER_ID = 41;

    public const INVALID_ORDER_ID = 42;

    public const CONFLICT_PROCESSING = 43;

    public const DUPLICATE_ITEM_ID = 45;

    public const INSUFFICIENT_USER_BALANCE = 1001;

    public const TRANSACTION_CANCELLED = 1003;

    public const REFUND_PROCESS_FAILED = 1080;

    public const REFUND_DENIED_ALREADY_REFUNDED = 1081;

    public const REFUND_NOT_SUPPORTED = 1088;

    public const INVALID_ORDER_GROUP_ID = 2019;

    public const CANCELLED_BY_PARTNER = 1017;

    // User errors
    public const ISSUER_DECLINED = 1002;

    public const USER_LIMIT_EXCEEDED = 1004;

    public const USER_DECLINED = 1006;

    public const USER_RESTRICTED = 4001;

    public const USER_NOT_VERIFIED_C06 = 4002;

    public const USER_LOGIN_FAILED = 4100;

    // Pending
    public const PENDING = 7000;

    public const PENDING_PROVIDER = 7002;

    public const TRANSACTION_CONFIRMED = 9000;

    // Info only (not error)
    public const INITIATED_WAITING_USER_CONFIRMATION = 1000;

    // Descriptions map (optional helper)
    public const DESCRIPTIONS = [
        self::SUCCESS => 'Thành công.',
        self::SYSTEM_MAINTENANCE => 'Hệ thống đang được bảo trì.',
        self::ACCESS_DENIED => 'Truy cập bị từ chối.',
        self::UNSUPPORTED_API_VERSION => 'Phiên bản API không được hỗ trợ cho yêu cầu này.',
        self::AUTHENTICATION_FAILED => 'Xác thực doanh nghiệp thất bại.',
        self::INVALID_LIST_DATA => 'Thông tin không hợp lệ trong danh sách dữ liệu khả dụng.',
        self::QR_CREATE_FAILED => 'QR Code tạo không thành công.',
        self::UNKNOWN_ERROR => 'Lỗi không xác định.',
        self::INVALID_REQUEST_FORMAT => 'Yêu cầu sai định dạng.',
        self::INVALID_AMOUNT => 'Số tiền giao dịch không hợp lệ.',
        self::INVALID_TRANSACTION_AMOUNT => 'Số tiền thanh toán vượt quá hạn mức hoặc không phù hợp.',
        self::DUPLICATE_REQUEST_ID => 'RequestId bị trùng.',
        self::DUPLICATE_ORDER_ID => 'OrderId bị trùng.',
        self::INVALID_ORDER_ID => 'OrderId không hợp lệ hoặc không được tìm thấy.',
        self::CONFLICT_PROCESSING => 'Xung đột trong quá trình xử lý giao dịch.',
        self::DUPLICATE_ITEM_ID => 'Trùng ItemId.',
        self::INSUFFICIENT_USER_BALANCE => 'Tài khoản người dùng không đủ tiền.',
        self::ISSUER_DECLINED => 'Giao dịch bị từ chối do nhà phát hành.',
        self::TRANSACTION_CANCELLED => 'Giao dịch bị hủy.',
        self::USER_LIMIT_EXCEEDED => 'Số tiền thanh toán vượt hạn mức của người dùng.',
        self::PAYMENT_URL_EXPIRED => 'QR code hoặc URL thanh toán đã hết hạn.',
        self::USER_DECLINED => 'Người dùng đã từ chối thanh toán.',
        self::ACCOUNT_INACTIVE => 'Tài khoản không tồn tại hoặc đang bị khóa.',
        self::PROMOTION_RESTRICTED => 'Giao dịch bị hạn chế theo chương trình khuyến mãi.',
        self::REFUND_PROCESS_FAILED => 'Giao dịch hoàn tiền thất bại.',
        self::REFUND_DENIED_ALREADY_REFUNDED => 'Giao dịch đã được hoàn.',
        self::REFUND_NOT_SUPPORTED => 'Giao dịch không hỗ trợ hoàn tiền.',
        self::INVALID_ORDER_GROUP_ID => 'OrderGroupId không hợp lệ.',
        self::CANCELLED_BY_PARTNER => 'Giao dịch bị hủy bởi đối tác.',
        self::USER_RESTRICTED => 'Tài khoản người dùng bị hạn chế.',
        self::USER_NOT_VERIFIED_C06 => 'Tài khoản người dùng chưa xác thực C06.',
        self::USER_LOGIN_FAILED => 'Người dùng chưa đăng nhập thành công.',
        self::PENDING => 'Giao dịch đang được xử lý.',
        self::PENDING_PROVIDER => 'Giao dịch đang được xử lý bởi nhà cung cấp.',
        self::TRANSACTION_CONFIRMED => 'Giao dịch đã được xác nhận thành công.',
        self::INITIATED_WAITING_USER_CONFIRMATION => 'Giao dịch đang chờ người dùng xác nhận.',
    ];

    public static function getDescription(int $code): string
    {
        return self::DESCRIPTIONS[$code] ?? 'Không xác định';
    }
}
