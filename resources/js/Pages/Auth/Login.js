import React, { useEffect } from 'react'
import {
  FormControl,
  FormLabel,
  Input,
  Checkbox,
  Stack,
  Link,
  Button,
} from '@chakra-ui/react'
import { useForm } from '@inertiajs/inertia-react'
import { Header, ValidationErrors } from '@/Components'
import { Guest } from '@/Layouts'

const Login = ({ status, canResetPassword }) => {
  const { data, setData, post, processing, errors, reset } = useForm({
    email: '',
    password: '',
    remember: '',
  })

  useEffect(() => {
    return () => {
      reset('password')
    }
  }, [])

  const onHandleChange = (event) => {
    setData(
      event.target.name,
      event.target.type === 'checkbox'
        ? event.target.checked
        : event.target.value,
    )
  }

  const submit = (e) => {
    e.preventDefault()

    post(route('login'))
  }

  const ErrorHandler = (e) => {
    console.dir(e)
  }

  return (
    <Guest>
      <Header title="เข้าสู่ระบบ" description="ลงชื่อเข้าใช้งานระบบ" />
      {status && ErrorHandler}
      <ValidationErrors errors={errors} />
      <form onSubmit={submit}>
        <Stack marginBottom={4}>
          <FormControl id="email">
            <FormLabel>ที่อยู่อีเมล์</FormLabel>
            <Input
              type="email"
              name="email"
              value={data.email}
              onChange={onHandleChange}
              placeholder="ที่อยู่อีเมล์"
            />
          </FormControl>
        </Stack>
        <Stack marginBottom={4}>
          <FormControl id="password">
            <FormLabel>รหัสผ่าน</FormLabel>
            <Input
              type="password"
              name="password"
              value={data.password}
              onChange={onHandleChange}
              placeholder="รหัสผ่าน"
            />
          </FormControl>
        </Stack>
        <Stack spacing={8} marginTop={8}>
          <Stack
            direction={{ base: 'column', sm: 'row' }}
            align={'start'}
            justify={'space-between'}
          >
            <Checkbox
              name="remember"
              value={data.remember}
              onChange={onHandleChange}
            >
              จำไว้ในระบบ
            </Checkbox>
            {canResetPassword && (
              <Link href={route('password.request')} color={'blue.900'}>
                ลืมรหัสผ่าน?
              </Link>
            )}
          </Stack>
          <Button
            isLoading={processing}
            colorScheme={'purple'}
            variant={'solid'}
            type="submit"
          >
            เข้าสู่ระบบ
          </Button>
          <Stack align={'center'}>
            <Link href={route('register')} color={'blue.900'}>
              ยังไม่มีบัญชีผู้ใช้งาน
            </Link>
          </Stack>
        </Stack>
      </form>
    </Guest>
  )
}

export default Login
