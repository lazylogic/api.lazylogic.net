<?php
/*
 * Serve Env
 */
defined( 'ENV_LOCAL' ) or define( 'ENV_LOCAL', 'LOCAL' );
defined( 'ENV_DEVEL' ) or define( 'ENV_DEVEL', 'DEVEL' );
defined( 'ENV_TEST' ) or define( 'ENV_TEST', 'TEST' );
defined( 'ENV_STAGING' ) or define( 'ENV_STAGING', 'STAGING' );
defined( 'ENV_PRODUCT' ) or define( 'ENV_PRODUCT', 'PRODUCTION' );

/*
 * Status
 */
defined( 'STATUS_NONE' ) or define( 'STATUS_NONE', 'NONE' );
defined( 'STATUS_SUCCESS' ) or define( 'STATUS_SUCCESS', 'SUCCESS' );
defined( 'STATUS_FAILURE' ) or define( 'STATUS_FAILURE', 'FAILURE' );

defined( 'STATUS_INITIAL' ) or define( 'STATUS_INITIAL', 'INITIAL' );          // 초기
defined( 'STATUS_PENDING' ) or define( 'STATUS_PENDING', 'PENDING' );          // 대기
defined( 'STATUS_AVAILABLE' ) or define( 'STATUS_AVAILABLE', 'AVAILABLE' );    // 가능
defined( 'STATUS_ACTIVATED' ) or define( 'STATUS_ACTIVATED', 'ACTIVATED' );    // 활성
defined( 'STATUS_INACTIVE' ) or define( 'STATUS_INACTIVE', 'INACTIVE' );       // 비활성
defined( 'STATUS_BLOCKED' ) or define( 'STATUS_BLOCKED', 'BLOCKED' );          // 차단
defined( 'STATUS_DISABLED' ) or define( 'STATUS_DISABLED', 'DISABLED' );       // 불가
defined( 'STATUS_DELETED' ) or define( 'STATUS_DELETED', 'DELETED' );          // 삭제
defined( 'STATUS_STARTED' ) or define( 'STATUS_STARTED', 'STARTED' );          // 시작
defined( 'STATUS_ONGOING' ) or define( 'STATUS_ONGOING', 'ONGOING' );          // 진행
defined( 'STATUS_APPLIED' ) or define( 'STATUS_APPLIED', 'APPLIED' );          // 적용
defined( 'STATUS_FINISHED' ) or define( 'STATUS_FINISHED', 'FINISHED' );       // 끝난
defined( 'STATUS_COMPLETED' ) or define( 'STATUS_COMPLETED', 'COMPLETED' );    // 완료
defined( 'STATUS_CONFIRMED' ) or define( 'STATUS_CONFIRMED', 'CONFIRMED' );    // 확인
defined( 'STATUS_ENDED' ) or define( 'STATUS_ENDED', 'ENDED' );                // 마감    재고 소진
defined( 'STATUS_CLOSED' ) or define( 'STATUS_CLOSED', 'CLOSED' );             // 종료    판매기간 종료
defined( 'STATUS_EXPIRED' ) or define( 'STATUS_EXPIRED', 'EXPIRED' );          // 만료
defined( 'STATUS_CANCELED' ) or define( 'STATUS_CANCELED', 'CANCELED' );       // 취소    해지요청
defined( 'STATUS_TERMINATED' ) or define( 'STATUS_TERMINATED', 'TERMINATED' ); // 종료    해지완료
defined( 'STATUS_REQUESTED' ) or define( 'STATUS_REQUESTED', 'REQUESTED' );    // 요청
defined( 'STATUS_REFUNDED' ) or define( 'STATUS_REFUNDED', 'REFUNDED' );       // 환불
defined( 'STATUS_REJECTED' ) or define( 'STATUS_REJECTED', 'REJECTED' );       // 거부    참여제한

/*
 * Mode / Action
 */
defined( 'MODE_INITIAL' ) or define( 'MODE_INITIAL', 'INITIAL' );          // 초기
defined( 'MODE_ACTIVATE' ) or define( 'MODE_ACTIVATE', 'ACTIVATE' );       // 활성
defined( 'MODE_INACTIVATE' ) or define( 'MODE_INACTIVATE', 'INACTIVATE' ); // 비활성
defined( 'MODE_BLOCK' ) or define( 'MODE_BLOCK', 'BLOCK' );                // 차단
defined( 'MODE_DISABLE' ) or define( 'MODE_DISABLE', 'DISABLE' );          // 불가
defined( 'MODE_DELETE' ) or define( 'MODE_DELETE', 'DELETE' );             // 삭제
defined( 'MODE_APPLY' ) or define( 'MODE_APPLY', 'APPLY' );                // 적용
defined( 'MODE_FINISH' ) or define( 'MODE_FINISH', 'FINISH' );             // 끝난
defined( 'MODE_COMPLETE' ) or define( 'MODE_COMPLETE', 'COMPLETE' );       // 완료
defined( 'MODE_CONFIRM' ) or define( 'MODE_CONFIRM', 'CONFIRM' );          // 확인
defined( 'MODE_END' ) or define( 'MODE_END', 'END' );                      // 마감    재고 소진
defined( 'MODE_CLOSE' ) or define( 'MODE_CLOSE', 'CLOSE' );                // 종료    판매기간 종료
defined( 'MODE_EXPIRE' ) or define( 'MODE_EXPIRE', 'EXPIRE' );             // 만료
defined( 'MODE_CANCEL' ) or define( 'MODE_CANCEL', 'CANCEL' );             // 취소    해지요청
defined( 'MODE_TERMINATE' ) or define( 'MODE_TERMINATE', 'TERMINATE' );    // 종료    해지완료
defined( 'MODE_REQUEST' ) or define( 'MODE_REQUEST', 'REQUEST' );          // 요청
defined( 'MODE_REFUND' ) or define( 'MODE_REFUND', 'REFUND' );             // 환불
defined( 'MODE_REJECT' ) or define( 'MODE_REJECT', 'REJECT' );             // 거부    참여제한

/*
 * Priv & Role
 */
defined( 'TYPE_ADMIN' ) or define( 'TYPE_ADMIN', 'ADMIN' );
defined( 'TYPE_MANAGER' ) or define( 'TYPE_MANAGER', 'MANAGER' );
defined( 'TYPE_OPERATOR' ) or define( 'TYPE_OPERATOR', 'OPERATOR' );
defined( 'TYPE_OFFICIAL' ) or define( 'TYPE_OFFICIAL', 'OFFICIAL' );
defined( 'TYPE_MEMBER' ) or define( 'TYPE_MEMBER', 'MEMBER' );
defined( 'TYPE_PROVIDER' ) or define( 'TYPE_PROVIDER', 'PROVIDER' );

defined( 'PRIV_ADMIN' ) or define( 'PRIV_ADMIN', 0x0001 );       // Ox0001  0000 0000 0000 0001     // 관리도구 설정 가능
defined( 'PRIV_MANAGER' ) or define( 'PRIV_MANAGER', 0x0002 );   // Ox0002  0000 0000 0000 0010     // 관리도구 관리 가능
defined( 'PRIV_OPERATOR' ) or define( 'PRIV_OPERATOR', 0x0004 ); // Ox0004  0000 0000 0000 0100     // 관리도구 운영 가능
defined( 'PRIV_OFFICIAL' ) or define( 'PRIV_OFFICIAL', 0x0008 ); // Ox0008  0000 0000 0000 1000     // 관리도구 로그인 가능
defined( 'PRIV_MEMBER' ) or define( 'PRIV_MEMBER', 0x0100 );     // Ox0100  0000 0001 0000 0000
defined( 'PRIV_PROVIDER' ) or define( 'PRIV_PROVIDER', 0x0200 ); // Ox0200  0000 0010 0000 0000

defined( 'ROLE_ADMIN' ) or define( 'ROLE_ADMIN', 0xFFFF );       // OxFFFF  1111 1111 1111 1111     MEMBER + OFFICIAL + OPERATOR + MANAGER + ADMIN
defined( 'ROLE_MANAGER' ) or define( 'ROLE_MANAGER', 0xFFFE );   // OxFFFE  1111 1111 1111 1110     MEMBER + OFFICIAL + OPERATOR + MANAGER
defined( 'ROLE_OPERATOR' ) or define( 'ROLE_OPERATOR', 0x030C ); // OxFF0C  0000 0011 0000 1100     MEMBER + OFFICIAL + OPERATOR
defined( 'ROLE_OFFICIAL' ) or define( 'ROLE_OFFICIAL', 0x0108 ); // OxFF08  0000 0001 0000 1000     MEMBER + OFFICIAL
defined( 'ROLE_MEMBER' ) or define( 'ROLE_MEMBER', 0x0100 );     // Ox0100  0000 0001 0000 0000     MEMBER
defined( 'ROLE_PROVIDER' ) or define( 'ROLE_PROVIDER', 0x0300 ); // Ox0300  0000 0011 0000 0000     MEMBER + PROVIDER

/*
 * Patterns
 */
// ^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$
// (?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$
defined( 'PATTERN_PASSWD' ) or define( 'PATTERN_PASSWD', '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/i' );
defined( 'PATTERN_PASSWD_LEN' ) or define( 'PATTERN_PASSWD_LEN', '/^(?=^.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/i' );